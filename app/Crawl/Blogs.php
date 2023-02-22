<?php

namespace App\Crawl;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Tag;
use App\Models\Article;

class Blogs
{
    public function blogs()
    {
        $url = 'https://viblo.asia/newest?page=';

        $client = new Client();

        for ($i = 1; $i <= 1; $i++) {

            $crawler = $client->request('GET', $url . $i);

            $crawler->filter('.post-title--inline h3')->each(
                function (Crawler $node) {
                    $slug = $node->filter('a')->attr("href");

                    $urlBlog = "https://viblo.asia";

                    $crawlerBlogs = (new Client())->request('GET', $urlBlog . $slug);

                    echo $urlBlog . $slug . "\n";

                    $crawlerBlogs->filter('html')->each(
                        function (Crawler $node) {

                            $name = $node->filter('.article-content__title')->text();

                            $description = $node->filterXPath('//meta[@name="description"]')->attr('content');

                            $content = $node->filter('.md-contents')->html();

                            $images = $node->filter('.attachment-epcl_single_standard')->extract(['src']);
                            echo $name . "\n";
                            echo $images . "\n";
                            // try {
                            //     Article::create([
                            //         "name" => $name,
                            //         "description" => $description,
                            //         "content" => $content,
                            //         "user_id" => 6,
                            //         "category_id" => 1,
                            //         "image" => "img-11-1675853887.png"
                            //     ]);

                            //     echo "Tạo thành công " . $name . "\n";
                            // } catch (\Throwable $th) {
                            //     echo "Article đã có" . "\n";
                            // }
                            echo "\n";
                        }
                    );
                }
            );
        }
        echo "Đã hoàn thành crawl dữ liệu từ " . $url . "\n";
    }

    public function blogsItviec()
    {
        $url = 'https://itviec.com/blog/category/su-nghiep-it/page/';

        $client = new Client();

        for ($i = 1; $i <= 10; $i++) {

            $crawler = $client->request('GET', $url . $i);

            $crawler->filter('.articles article')->each(
                function (Crawler $node) {
                    $slug = $node->filter('header h2 a')->attr("href");

                    $urlBlog = "https://itviec.com/blog/";

                    $crawlerBlogs = (new Client())->request('GET',  $slug);

                    echo $urlBlog . $slug . "\n";

                    $crawlerBlogs->filter('html')->each(
                        function (Crawler $node) {

                            $name = $node->filter('.main-article header h1')->text();

                            $description = $node->filterXPath('//meta[@name="description"]')->attr('content');

                            $content = $node->filter('.text')->html();
                            echo $name . "\n";

                            $images = $node->filterXPath('//meta[@property="og:image"]')->attr('content');
                            echo $images[0] . "\n";

                            $imageData = file_get_contents($images);
                            $nameImage = basename($images);
                            file_put_contents('public/assets/images/articles/' . $nameImage, $imageData);
                            echo $nameImage . "\n";

                            try {
                                Article::create([
                                    "name" => $name,
                                    "description" => $description,
                                    "content" => $content,
                                    "user_id" => 6,
                                    "category_id" => 1,
                                    "image" => $nameImage
                                ]);

                                echo "Tạo thành công " . $name . "\n";
                            } catch (\Throwable $th) {
                                echo "Article đã có" . "\n";
                            }
                            echo "\n";
                        }
                    );
                }
            );
        }
        echo "Đã hoàn thành crawl dữ liệu từ " . $url . "\n";
    }

    public function tags()
    {
        $url = 'https://howkteam.vn/tags?page=';

        $client = new Client();

        echo $url . "\n";

        for ($i = 1; $i <= 1287; $i++) {

            $crawler = $client->request('GET', $url . $i);

            $crawler->filter('.post-tag')->each(
                function (Crawler $node) {
                    $name = $node->filter('.post-tag')->text();

                    try {
                        Tag::create([
                            "name" => $name
                        ]);

                        echo "Tạo thành công " . $name . "\n";
                    } catch (\Throwable $th) {
                        echo "Tags đã có" . "\n";
                    }
                }
            );
        }
        echo "Đã hoàn thành crawl dữ liệu từ " . $url . "\n";
    }
}