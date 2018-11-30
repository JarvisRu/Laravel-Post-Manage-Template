@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header text-center">
                    新增公告
                </h3>

                <div class="card-body">
                    <form action="{{ route('new-announcement') }}" method="POST" class="form-horizontal" id="form">
                        {{ csrf_field() }}

                        <div class="form-group col-md-6">
                            <label for="title">標題</label> 
                            <input id="title" class="form-control" name="title" type="text" placeholder="標題" class="form-control input-md" required autufocus>    
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="category">文章分類</label> 
                            <select class="form-control" name="category_id" >
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-md-11">
                                <label for="content" class="control-label">內文</label>
                                <textarea class="form-control"  rows="5" id="content" name="content"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-11">
                                <label for="reference" class="control-label">參考出處</label>                   
                                <textarea class="form-control"  rows="2" id="reference" name="reference"></textarea>
                            </div>
                        </div>

                        <div class="form-group alert alert-info">
                            說明
                                <ul>
                                    <li>標題與內文為必填</li>
                                    <li>標題請勿超過30字</li>
                                </ul>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    發佈
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    重置
                                </button>
                            </div>
                        </div>

                    </form>
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
