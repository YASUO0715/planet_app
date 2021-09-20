<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auction edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>惑星情報編集</h1>
    <!-- 更新先はitemsのidにしないと増える php artisan rote:listで確認① -->
    <form action="/planets/{{ $planet->id }}" method="post">
        @csrf
        <!-- formタグはPUTやDELETEをサポートしていないため、@ methodで指定する必要がある -->
        @method('PATCH')
        <!-- idはそのまま -->
        <input type="hidden" name="id" value="{{ $planet->id }}">
        <p>
            <label for="name">名前 <input type="text" name="name" value="{{ old('name', $planet->name) }}"></label>
        </p>
        <p>
            <label for="englishname">名前(英名) <input type="text" name="englishname" value="{{ old('englishname',$planet->englishname) }}"></label>
        </p>
        <p>
            <label for="radius">半径 <input type="number" name="radius" value="{{ old('radius',$planet->radius) }}"></label>
        </p>
        <p>
            <label for="weight">重量 <input type="number" name="weight" value="{{ old('weight',$planet->weight) }}"></label>
        </p>
        <input type="submit" value="更新">
        <p><b><a href="/planets">戻る</a></b></p>
    </form>
</body>

</html>