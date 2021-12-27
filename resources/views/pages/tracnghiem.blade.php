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
        /* height: 500px; */
        /* overflow-y: scroll; */
        /* overflow-x: hidden; */
        /* border: 2px solid black; */
        margin: 0 20px;
    }
    .giua{
        text-align: center;
    }
    th{
        text-align: center;
    }
    .tick{
        display: flex;
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
                    <h2>Trắc nghiệm tính cách chọn ngành</h1>
                    <div class="gioithieu">
                        <p>Trắc nghiêṃ sở thích nhằm khám phá ngành nghề nào phù hơp̣ với baṇ thông qua những sở thích của baṇ. Với mỗi sự lựa chọn, baṇ cho mức điểm phù hợp với bản thân từ 0 đến 4 điểm với:</p>
                        <ul>
                            <li>Điểm 0: Chưa bao giờ đúng.</li>
                            <li>Điểm 1: Đúng ở một vài trường hợp.</li>
                            <li>Điểm 2: Chỉ đúng một nữa.</li>
                            <li>Điểm 3: Đúng với hầu hết mọi trường hợp, chỉ có một vài trường hợp là chưa đúng lắm.</li>
                            <li>Điểm 4: Hoàn toàn đúng với bạn</li>
                        </ul>
                        <p>Hãy cân nhắc thật kỹ và trả lời trung thực từng câu hỏi bằng cách chọn một câu trả lời duy nhất mô tả đúng nhất về bạn. Hãy trả lời như chính con người thật của bạn chứ đừng bao giờ chọn câu trả lời vì bạn muốn mình phải như vậy.</p>
                        <p>Chính việc trả lời trung thực sẽ đem lại kết quả chính xác, giúp bạn tìm ra đúng thiên hướng sở thích, nghề nghiệp của mình, từ đó chọn được nghề phù hợp nhất.</p>
                    </div>
                    <div class = "bang">
                        <form action="{{route('ketquatracnghiem')}}" method="post">
                        <table class="table table-striped">
                        <thead>
                          <tr>
                            <th width="10%">STT</th>
                            <th width="55%">Câu hỏi</th>
                            <th width="35%">Câu trả lời</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cauhoi as $row)
                            <tr>
                                <td class = "giua">Câu {{$row->ID}}</td>
                                <td class ="">{{$row->Cauhoi}}</td>
                                <td class ="tick">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{$row->ID}}" id="inlineRadio0" value="0"/>
                                        <label class="form-check-label" for="inlineRadio0">0</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{$row->ID}}" id="inlineRadio1" value="1"/>
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"  type="radio" name="{{$row->ID}}" id="inlineRadio2" value="2"/>
                                        <label class="form-check-label"  for="inlineRadio2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{$row->ID}}" id="inlineRadio3" value="3"/>
                                        <label class="form-check-label" for="inlineRadio3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{$row->ID}}" id="inlineRadio4" value="4"/>
                                        <label class="form-check-label" for="inlineRadio4">4</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{ csrf_field()}}
                      </table>
                        <button type="submit" id="nutxem">Xem kết quả</button>
                      </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection