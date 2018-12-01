@extends('layouts.backend')

@section('content')
<div class="container">
    @include('manage.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header text-center">
                    公告管理
                </h3>

                <div class="card-body">
                    {{-- 新增公告 & 搜尋公告 --}}
                    <a href="{{ route('view-new') }}"><button class="btn btn-primary">新增公告</button></a>
                    <a href="{{ route('search-announcement-form') }}"><button class="btn btn-success">搜尋公告</button></a>
                    <hr>

                    {{-- 依照分類 --}}
                    <form action="{{ route('manage-index') }}" style="display: inline">
                        <button class="btn btn-default">All</button>
                    </form>
                    @foreach ($categories as $category)
                        <form action="{{ route('search-announcement') }}" style="display: inline">
                            <input type="hidden" name="category[]" value="{{ $category->name }}">
                            <button class="btn btn-default">{{ $category->name }}</button>
                        </form>
                    @endforeach
                    <hr>

                    {{-- 管理公告 --}}
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>分類</th>
                                <th>標題</th>
                                <th>點擊次數</th>
                                <th>建立時間</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($announcements))
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td>{{ $announcement->category->name }}</td>
                                        <td>{{ $announcement->title }}</td>
                                        <td>{{ $announcement->reach }}</td>
                                        <td>{{ $announcement->created_at }}</td>
                                        <td>
                                            <a href="{{ route('view-edit-announcement', ['announcement' => $announcement->id, 'mode' => 1]) }}">v</a>
                                            <a href="{{ route('view-edit-announcement', ['announcement' => $announcement->id, 'mode' => 2]) }}">e</a>
                                            <form id="delete-announcement-{{ $announcement->id }}" style="display: inline" action="{{ route('delete-announcement', ['announcement' => $announcement->id]) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <a href="#delete-announcement-{{ $announcement->id }}" onclick="if(confirm('確定要刪除嗎？')) $('#delete-announcement-{{ $announcement->id }}').submit()">
                                                    d</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">沒有任何公告。</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
