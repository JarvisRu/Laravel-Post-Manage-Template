@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">公告內容</h3>
                    <form id="delete-announcement-{{ $announcement->id }}" style="text-align:right" action="{{ route('delete-announcement', ['announcement' => $announcement->id]) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <a href="{{ route('view-edit-announcement', ['announcement' => $announcement->id, 'mode' => 2]) }}" class="btn">編輯公告</a> |
                        <a href="#delete-announcement-{{ $announcement->id }}" class="btn" onclick="if(confirm('確定要刪除嗎？')) $('#delete-announcement-{{ $announcement->id }}').submit()">
                            刪除此公告</a>
                    </form>

                </div>
                <div class="card-body">

                    <form class="form-horizontal">
                
                        <div class="form-group">
                            <label class="col-md-4  control-label">主旨</label>
                            <div class="col-md-6">
                                <p>{{ $announcement->title }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class ="col-md-4  control-label">發佈時間</label>
                            <div class="col-md-6">
                                {{ $announcement->created_at }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class ="col-md-4  control-label">更新時間</label>
                            <div class="col-md-6">
                                {{ $announcement->updated_at }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class ="col-md-4  control-label">分類</label>
                            <div class="col-md-6">
                                {{ $announcement->getCategory()->name }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class ="col-md-4 control-label">點擊次數</label>
                            <div class="col-md-6">
                                {{ $announcement->reach }}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class ="col-md-4 control-label">內文</label>
                            <div class="col-md-6">
                                {{ $announcement->content }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class ="col-md-4 control-label">參考出處</label>
                            <div class="col-md-6">
                                {{ $announcement->reference }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <a class="btn" href="{{ route("manage-index") }}" role="button">
                                    > 返回
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
