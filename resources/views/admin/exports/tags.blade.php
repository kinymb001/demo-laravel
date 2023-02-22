<table>
    <thead>
        <tr>
            <th style="font-size: 18px;text-align: center;background: #1E66F8;color: white;width: 250px;">Name</th>
            <th style="font-size: 18px;text-align: center;background: #1E66F8;color: white;width: 250px;">Slug</th>
            <th style="font-size: 18px;text-align: center;background: #1E66F8;color: white;width: 250px;">Articles</th>
            <th style="font-size: 18px;text-align: center;background: #1E66F8;color: white;width: 300px;">Created at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->slug }}</td>
                <td>{{ $value->articles_count }}</td>
                <td>{{ date_format($value->created_at, 'H:i:s d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
