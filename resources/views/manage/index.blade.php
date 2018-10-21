@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">
                    公告管理
                </h3>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>分類</th>
                                <th>標題</th>
                                <th>建立時間</th>
                                <th>點擊次數</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (count($announcements))
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td>
                                            <a href="{{ route('search-announcement') }}?category[]={{ $announcement->category->name }}">
                                                {{ $announcement->category->name }}
                                            </a>
                                        </td>
                                        <td>{{ $announcement['title'] }}</td>
                                        <td>
                                            <a href="{{ route('search-announcement') }}?creator={{ $announcement->creator->name }}">
                                                {{ $announcement->creator->name }}
                                            </a>
                                        </td>
                                        <td>{{ $announcement['created_at'] }}</td>
                                        <td>{{ $announcement['reach'] }}</td>
                                        <td>
                                            <a href="{{ route('view-announcement', ['announcement' => $announcement->id]) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a href="{{ route('edit-announcement', ['id' => $announcement->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <form id="delete-announcement-{{ $announcement->id }}" style="display: inline" action="{{ route('delete-announcement', ['announcement' => $announcement->id]) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <a href="#delete-announcement-{{ $announcement->id }}" onclick="if(confirm('確定要刪除嗎？')) $('#delete-announcement-{{ $announcement->id }}').submit()">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                
                    {{ $announcements->appends(Input::except(['page']))->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
