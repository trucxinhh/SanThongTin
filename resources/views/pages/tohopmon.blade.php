@extends('index')

@section('title')
Các ngành học
@endsection

@section('style')
<style>
    h2{
        text-align: center;
    }
    .bang{
        height: 500px;
        overflow-y: scroll;
        overflow-x: hidden;
        border: 2px solid black;
        margin: 0 20px;
    }
    .giua{
        text-align: center;
    }
    th{
        text-align: center;
    }
    .arrow-pointer{
        right: 45px;
    }
</style>
@endsection

@section('content')
<section style=" margin-bottom: 20px">
    <div class="container">
        <div>
            <div class="row">
                <div class="col-sm-3" > <!-- sidebar trang chủ -->
                    @include('layout.sidebar_left')
                </div>
                <div class="col-sm-9" style="padding-left:20px;">
                    <h2>Khối thi đại học</h1>
                    <div class = "bang">
                        <table class="table table-striped">
                        <thead>
                          <tr>
                            <th width="15%">Khối thi</th>
                            <th width="15%">Tên khối</th>
                            <th width="70%">Tổ hợp môn</th>
                          </tr>
                        </thead>
                        <tbody >
                            @foreach($tohopmon as $row)
                            <tr>
                                <td class = "giua">{{$row->KhoiTH}}</td>
                                <td class = "giua">{{$row->TenTH}}</td>
                                <td>{{$row->MonThi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection