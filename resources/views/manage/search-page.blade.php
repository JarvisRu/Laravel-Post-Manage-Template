@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header text-center">
                    搜尋公告
                </h3>

                <div class="card-body">
                    <form action="{{ route('search-announcement') }}" class="form-horizontal" id="form">

                        <div class="form-group col-md-6">
                            <label for="title">公告標題</label> 
                            <input id="title" class="form-control" name="title" type="text" placeholder="標題" class="form-control input-md" autufocus>    
                        </div>

                        <div class="form-group">
                            <label for="start_at" class="col-md-4 control-label">起始時間</label>
                
                            <div class="col-md-6">
                                <input id="start_at"  type="datetime-local" class="form-control" name="start_at" value="{{ date('Y-m-d\TH:i',strtotime('-1 year')) }}">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="finish_at" class="col-md-4 control-label">結束時間</label>
                
                            <div class="col-md-6">
                                <input id="finish_at"  type="datetime-local" class="form-control" name="finish_at" value="{{ date('Y-m-d\TH:i') }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category" class="control-label">分類篩選</label>
                            <select name="category[]" class="form-control" multiple>
                                @foreach ($categories as $category)
                                    <option selected value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group alert alert-info">
                            說明
                            <ul>
                                <li>不需要查詢的欄位請留白</li>
                                <li>若不填寫起始時間，時間將預設為去年同月同日</li>
                                <li>若不填寫結束時間，時間將預設為今年同月同日</li>
                                <li>日期格式請符合YYYY-MM-DD hh:mm:ss</li>
                                <li>分類預設為全選，若有想要選取的特定範圍請善用ctrl選擇</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <a class="btn" href="{{ route("manage-index") }}" role="button">
                                    > 返回
                                </a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4  offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    搜尋
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
