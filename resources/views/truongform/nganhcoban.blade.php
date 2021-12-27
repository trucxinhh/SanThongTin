@extends('index2')
@section('title')
    Cập nhật thông tin tuyển sinh
@endsection
@section('style')
<style>
    #formdknganh{
      background-color: #f9f9f9;
      overflow: hidden;
      position: relative;
      margin-top: 70px;
    }
    #formdknganh .col-sm-3.left{
      width: 21%;
      padding: 20px 30px;
      margin: 20px -20px 30px 90px;
      background-color: #f5f5f5;
      border-radius: 10px;
    }
    #formdknganh .col-sm-3.left h3{
      padding-bottom: 20px;
      margin: 0;
      text-align: center
    }
     #formdknganh .col-sm-3.left ul{
      padding-left: 5px;
      color: #555555
     }
    #formdknganh .col-sm-3.left ul li{
     border-bottom: 2px solid #AAAAAA;
     font-size: 18px;
     padding: 10px 0;
    }
    #formdknganh .col-sm-3.left ul li a{
      padding-left: 15px;
      color: #555555
    }
    #formdknganh .col-sm-3.left ul li:hover{
      background-color: #dfdff9;
      cursor: pointer;
    }
    #formdknganh .col-sm-3.right{
      width: 30%;
      margin: 20px 0;
      /* margin-left: 10px */
    }
    #formdknganh .col-sm-3.right img{
      width: 80%;
    }
    .avatar.dki{
      width: 170px;
      cursor: pointer;
      
    }
    .uplogo.active{
      display: flex;
    }
    li.active-menu2{
       background-color: #ebeff2;
    }
    ul.menu.truong li.active-menu2 a{
      color: #CC0000;
    }
    input{border: none; width: 82px;}
    th{ text-align: center }
    th,td{
      width: 50px; font-size: 14px; background-color: #ccc;
    }
    table {
    counter-reset: rowNumber;
    }

    table tr:not(:first-child) {
        counter-increment: rowNumber;
    }

    table tr td:first-child::before {
        content: counter(rowNumber);
        min-width: 1em;
        /* margin-right: 0.5em; */
        /* text-align: center; */
    }
    td::before{
        margin-left: 7px;
    }
</style>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
  const fileUploader = document.getElementById('file-uploader');
  fileUploader.addEventListener('change', (event) => {
    const files = event.target.files;
    console.log('files', files);
  });
</script>
<script>
  $(document).ready(function(){
            $('.avatar.dki').click(function() {
              $('.uplogo').show();
            });
        });
</script>
<SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var colCount = table.rows[0].cells.length;

            var row = table.insertRow(rowCount);

            // row = table.insertRow(table.rows.length);
            for(var i = 0; i <= colCount; i++) {

                var newcell = row.insertCell(i);
                if(i == (colCount - 0)) {
                    newcell.innerHTML = "<INPUT type=\"button\" value=\"Delete Row\" onclick=\"removeRow(this)\"/>";
                } else {
                    newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                }
            }
        }

        /**
         * This method deletes the specified section of the table
         * OR deletes the specified rows from the table.
         */
        function removeRow(src) {

            var oRow = src.parentElement.parentElement;
            var rowsCount = 0;
            for(var index = oRow.rowIndex; index >= 0; index--) {

                document.getElementById("dataTable").deleteRow(index);
                if(rowsCount == (2- 1)) {
                    return;
                }
                rowsCount++;
            }
            //once the row reference is obtained, delete it passing in its rowIndex
            /* document.getElementById("dataTable").deleteRow(oRow.rowIndex); */
        }

</SCRIPT>
@endsection
@section('content')
  <section id="formdknganh">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 left">
            <center>
              <img class="avatar dki" src="{{URL::to('/')}}/public/frontend/images/avt3.png" alt=""title="Thay logo">
              <!-- <h4 id="bamlogo">Chọn logo</h4> -->
              <div class="uplogo" style="display: none;justify-content: center; flex-direction: column; align-items: center;" >
                <input type="file" id="file-uploader" accept=".jpg, .png" multiple >
              </div>
            </center>
            <div style="display: flex;justify-content: center; flex-direction: column;">
              <h4>Mã trường: DDQ</h4>
              <h4>Năm thành lập: 1975</h4>
              <h4>Loại trường: </h4>
              <h4>Hệ đào tạo: </h4>
              <h4>Khu vực: </h4>
            </div>
          </div>
          <div class="col-sm-9" style="width: 69%;margin-left: 4%;">
            <h3>Đại học Kinh tế - ĐHĐN 2021</h3>
            <form action="">
              <TABLE id="dataTable" width="350px" border="1">
                <TR>
                  <TH> STT </TH>
                  <TH> Mã ngành </TH>
                  <TH> Tên ngành </TH>
                  <TH> Tên chung </TH>
                  <TH> Chỉ tiêu </TH>
                  <TH> Học phí </TH>
                  <TH> Khối thi </TH>
                  <TH> Điểm chuẩn </TH>
                  <TH> Ghi chú </TH>
                </TR>
                <TR>
                  <TD >  </TD>
                  <TD><input type="text" name ="Mã ngành" placeholder="75112122" style="width: 106px;"></TD>
                  <TD><input type="text" name ="Tên ngành" placeholder="Thương mại điện tử" style="width: 170px;"></TD>
                  <TD><input type="text" name ="Tên chung" placeholder="Thương mại điện tử" style="width: 170px;"></TD>
                  <TD><input type="text" name ="Chỉ tiêu" placeholder="120" style="width: 70px;"></TD>
                  <TD><input type="text" name ="Học phí" placeholder="16,5" style="width: 60px;"></TD>
                  <TD><input type="text" name ="Khối thi" placeholder="A00, A01, D01" style="width: 135px;"></TD>
                  <TD><input type="text" name ="Điểm chuẩn" placeholder="24" style="width: 95px;"></TD>
                  <TD><input type="text" name ="Ghi chú" placeholder="" style="width: 100px;"></TD>
                  <TD><INPUT type="button" value="Add Row" onclick="addRow('dataTable')" /></TD>
                </TR>
              </TABLE>
              <button class="nganhcoban" type="submit" style="margin-top: 10px;"> Cập nhật </button>
            </form>
          </div>
        </div>
      </div>
  </section>

@endsection