@extends('index')
@section('content')
    <center><h1>TRA CỨU ĐIỂM CHUẨN</h1></center>
    <br>
    <div class="search">
        <div class="wrapper">
            <div class="search-field">
                <form action="{{route('diemchuan/ketqua')}}" method="post">
                    {{ csrf_field()}}
                    <div class="s">
                        <div class="filter-group">
                            <span id="loc">Mã Trường</span>
                            <input class="form-control" list="matruong" name="matruong">
                            <datalist id="matruong">
                                <option value="BVH">
                                <option value="DDQ">
                                <option value="HHT">
                                <option value="DHF">
                                <option value="DSG">
                                <option value="SPS">
                            </datalist>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Mã Ngành</span>
                            <input class="form-control" list="manganh" name="manganh">
                            <datalist id="manganh">
                                <option value="7340122">
                                <option value=" 7340201">
                                <option value="7310107">
                                <option value="7310205">
                                <option value="7340120">
                                <option value="7380101">
                                <option value="7329001">
                                <option value="7340115">
                                <option value="7140231">
                                <option value="7140234">
                                <option value="7510203">
                            </datalist>
                        </div>
                        <div class="filter-group">
                            <span id="loc">Nam</span>
                            <input class="form-control" list="nam" name="nam">
                            <datalist id="nam">
                                <option value="2020">
                                <option value="2019">
                                <option value="2018">
                                <option value="2017">
                                <option value="2016">
                                <option value="2015">
                            </datalist>
                        </div>
                        <br>
                        <div class="action-group" style=" margin-left: 20px">
                            <button class="temp-submit" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>

@endsection
