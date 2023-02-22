<?php

namespace app\Libs;

class LogViewer
{
    private static string $file;

    /**
     * Map debug levels to Bootstrap classes.
     *
     * @var array
     */
    private static array $levels_classes = [
        'debug' => 'info',
        'info' => 'info',
        'notice' => 'info',
        'warning' => 'warning',
        'error' => 'danger',
        'critical' => 'danger',
        'alert' => 'danger',
        'emergency' => 'danger',
        'processed' => 'info',
    ];

    /**
     * Map debug levels to icon classes.
     *
     * @var array
     */
    private static array $levels_imgs = [
        'debug' => 'info',
        'info' => 'info',
        'notice' => 'info',
        'warning' => 'warning',
        'error' => 'warning',
        'critical' => 'warning',
        'alert' => 'warning',
        'emergency' => 'warning',
        'processed' => 'info',
    ];

    /**
     * Log levels that are used.
     *
     * @var array
     */
    private static array $log_levels = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug', 'processed'];

    /**
     * Arbitrary max file size.
     */
    const MAX_FILE_SIZE = 2097152;
    const MAX_FILE_SIZE_TO_READ = 2097152;

    /**
     * @param string $file
     *
     * @throws \Exception
     */
    public static function setFile(string $file)
    {
        $file = static::pathToLogFile($file);
        if (app('files')->exists($file)) {
            static::$file = $file;
            // dd($file);
        }
    }

    /**
     * @param string $file
     * @return string
     * @throws \Exception
     */
    public static function pathToLogFile(string $file)
    {
        $logsPath = storage_path('logs');

        if (app('files')->exists($file)) {
            // try the absolute path
            return $file;
        }

        $file = $logsPath . '/' . $file;

        // check if requested file is really in the logs directory
        if (dirname($file) !== $logsPath) {
            throw new \Exception('No such log file');
        }

        return $file;
    }

    /**
     * @return string
     */
    public static function getFileName()
    {
        return basename(static::$file);
    }

    /**
     *
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function all()
    {
        $log = [];

        if (!static::$file) {
            $log_file = static::getFiles();
            if (!count($log_file)) {
                return [];
            }
            static::$file = $log_file[0];
        }

        if (app('files')->size(static::$file) > static::MAX_FILE_SIZE) {
            $file = file_get_contents(static::$file, false, null, -self::MAX_FILE_SIZE_TO_READ);
        } else {
            $file = app('files')->get(static::$file);
        }

        $pattern = '/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\].*/';

        preg_match_all($pattern, $file, $headings);
        if (!is_array($headings)) {
            return $log;
        }
        $stack_trace = preg_split($pattern, $file);

        if ($stack_trace[0] < 1) {
            array_shift($stack_trace);
        }
        foreach ($headings as $h) {
            foreach ($h as $key => $line) {
                // Extract the log level and context from the line
                preg_match('/^\[(.*?)\] (.*?)\:(.*)/', $line, $matches);
                $level = $matches[1];
                $context = $matches[2];
                $message = $matches[3];

                // Determine the log folder based on the context
                $folder = '';
                if (strpos($context, 'production') !== false) {
                    $folder = 'production';
                } elseif (strpos($context, 'local') !== false) {
                    $folder = 'local';
                }

                // Determine the log level class and image based on the log level
                $levelClass = '';
                $levelImg = '';
                $explode_type = explode('.', $context);
                $type = strtolower($explode_type[1]);

                switch ($type) {
                    case 'emergency':
                    case 'alert':
                        $levelClass = 'badge badge-danger';
                        $levelImg = 'icons/critical.svg';
                        break;
                    case 'error':
                        $levelClass = 'badge badge-danger';
                        $levelImg = 'icons/error.svg';
                        break;
                    case 'warning':
                        $levelClass = 'badge badge-warning';
                        $levelImg = 'icons/warning.svg';
                        break;
                    case 'notice':
                        $levelClass = 'badge badge-light';
                        $levelImg = 'icons/info.svg';
                        break;
                    case 'info':
                        $levelClass = 'badge badge-info';
                        $levelImg = 'icons/info.svg';
                        break;
                    case 'debug':
                        $levelClass = 'badge badge-dark';
                        $levelImg = 'icons/debug.svg';
                        break;
                    default:
                        $levelClass = 'badge badge-secondary';
                        $levelImg = 'icons/debug.svg';
                        break;
                }

                // Create a new log entry and add it to the log array
                $log[] = [
                    'type' => $type,
                    'date' => $level,
                    'folder' => $folder,
                    'class' => $levelClass,
                    'level_img' => $levelImg,
                    'index' => $key + 1,
                    'text' => $message,
                    'in_file' => null,
                    'stack' => '',
                ];
            }
        }
        return array_reverse($log);
    }

    /**
     * @param bool $basename
     * @param string $file_name
     * @return array|false
     */
    public static function getFiles(bool $basename = false, string $file_name = '')
    {
        $files = glob(storage_path() . '/logs/*' . $file_name . '*.log');
        // dd( $file_name);
        $files = array_reverse($files);
        $files = array_filter($files, 'is_file');

        if ($basename && is_array($files)) {
            foreach ($files as $k => $file) {
                $file_name = basename($file);
                if (file_exists(storage_path('logs/' . $file_name))) {
                    $files[$k] = [
                        'id' => $k,
                        'file_name' => $file_name,
                        'file_size' => filesize(storage_path('logs/' . $file_name)),
                        'last_modified' => filemtime(storage_path('logs/' . $file_name)),
                    ];
                }
            }
        }
        return array_values($files);
    }
}
