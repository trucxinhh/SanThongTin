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
                    <h2>Kết quả trắc nghiệm</h1>
                    @if ($tinhcach=='R')
                        <div class="wrap-ket-qua-phieuA">
                            <div class="wrap-thu-tu-A"></div>
                            <b>Bạn thuộc Nhóm R (Realistic): Nhóm kỹ thuật – Người thực hiện</b><br /><br />
                            <div style="padding-left:15px;">
                                Người thuộc nhóm tính cách này thích hành động hơn là suy nghĩ hay nghiên cứu các lý thuyết trừu tượng. Giỏi giải quyết những việc đòi hỏi sự khóe léo của đôi bàn tay, phối hợp giữa các kỹ năng và thao tác vận động. Các phương thức giải quyết công việc thường đơn giản, dễ áp dụng và đạt được hiệu quả cụ thể. <br /><br />
                                Họ có xu hướng quan tâm đến cơ khí, xây dựng, thích làm việc với các công cụ, máy móc, thiết bị. Thích môi trường làm việc gắn với thiên nhiên, xa bàn giấy.<br /><br />
                                <b>Ngành nghề phù hợp</b><br />
                                -   <i>Cơ khí & Xây dựng:</i> Kỹ sư cơ khí, chế tạo máy, luyện kim, điện lạnh, xây dựng, giao thông, thủy lợi, trắc địa, mỏ, địa chất, dầu khí, vận tải, hàng hải<br /><br />
                                -   <i>Điện, điện tử:</i> Kỹ sư điện, điện tử, phần cứng máy tính, viễn thông, tự động hóa <br /><br />
                                -   <i>Thiên nhiên & Nông nghiệp:</i> Kỹ sư nông nghiệp, lâm nghiệp, thủy sản, bác sỹ thú y <br /><br />
                                -   <i>Quân sự, thể thao và các dịch vụ bảo vệ:</i> Kỹ thuật quân sự, an ninh, vận động viên, huấn luyện viên, giám sát phòng cháy, chữa cháy, giám sát chất lượng, an toàn lao động<br /><br />
                                -   <i>Các nghề thợ:</i> Thợ sơn, thợ xây dựng, đúc, hàn, mộc, sửa chữa điện, điện tử, lái xe.<br /><br />
                                -   <i>Các ngành nghề liên quan khác:</i> Kỹ thuật trong y học, vật lý trị liệu, kiến trúc sư, khí tượng thủy văn, hải dương học, dược, đầu bếp.<br /><br />
                            </div>    
                            <div style="width:80%;margin:auto;border-bottom:solid 1px #efefef;text-align: center"></div>
                        </div>        
                    @elseif ($tinhcach=='I')
                    <div class="wrap-ket-qua-phieuB">
                        <div class="wrap-thu-tu-B"></div>
                        <b>Bạn thuộc Nhóm I (Investigative): Nhóm nghiên cứu – Người suy nghĩ</b><br /><br />
                       <div style="padding-left:15px;">
                           Những người thuộc nhóm tính cách này thường thích suy nghĩ, quan sát hơn là hành động. Họ thông minh và có khả năng giải quyết các vấn đề khoa học. Thích và có khả năng tìm tòi, nghiên cứu những quy luật trong tự nhiên và đời sống xã hội. Độc lập sáng tạo, có tư duy phản biện, lật lại vấn đề. Thích trầm tư suy nghĩ hơn là tham gia các công tác xã hội sôi nổi. <br /><br />
                           Họ tự tổ chức công việc của mình rất tốt, thường lập kế hoạch và thực hiện theo đúng kế hoạch đã đề ra, cũng bởi vì họ có tính kiên trì, tỉ mỉ và ngăn nắp.<br /><br />
                           <b>Ngành nghề phù hợp</b><br />
                           -    <i>Nghiên cứu khoa học:</i> Nhà toán học, nhà vật lý học, nhà thiên văn học, nhà hóa học, nhà sinh vật học, sinh thái học (động vật, thực vật, thổ nhưỡng, nông học, lâm học, bệnh học thủy sản, thú y, bệnh học cây trồng)<br /><br />
                            -   <i>Kỹ thuật công nghệ:</i> Công nghệ thông tin, công nghệ sinh học, khoa học môi trường , khí tượng thủy văn, hải dương học, nhà nghiên cứu địa lý, địa chất, nghiên cứu xây dựng, nghiên cứu vật liệu mới, chuyên gia dinh dưỡng, kỹ sư hóa thực phẩm (công nghệ thực phẩm)<br /><br />
                            -   <i>Y khoa:</i> Bác sỹ (nhi khoa, đa khoa, nha khoa, phẫu thuật / chỉnh hình, tâm thần), dược sỹ, y học cổ truyền<br /><br />
                            -   <i>Các ngành nghề liên quan:</i> Khoa học xã hội (nhà tâm lý học, nhà ngôn ngữ học, nhà xã hội học, đô thị học, nhà sử học, khảo cổ học, nhà nhân học, nhà văn hóa, Việt Nam học, quốc tế học, chính trị học, triết học), luật sư, an ninh điều tra, giám định pháp y, nhà kinh tế học, phân tích tài chính, nghiên cứu thị trường, thống kê dự báo, nghiên cứu và quy hoạch đô thị (kiến trúc sư)<br /><br />
                       </div>
                    </div>        
                    @elseif ($tinhcach=='A')
                    <div class="wrap-ket-qua-phieuC">
                        <div class="wrap-thu-tu-C"></div>
                        <b>Bạn thuộc Nhóm A (Artistic): Nhóm nghệ thuật – Người sáng tạo</b><br /><br />
                        <div style="padding-left:15px;">
                            Nhóm người này có tính cách cởi mở, sáng tạo, nhạy cảm và giàu cảm xúc cùng với trí tưởng tượng phong phú. Họ không thích những khuôn mẫu, những nguyên tắc mà thích có sự độc đáo và riêng biệt. <br /><br />
                            Họ có khả năng biểu đạt tình cảm của mình, thích được tham gia vào các hoạt động của con người, đặc biệt trong lĩnh vực văn hóa, nghệ thuật.<br /><br />
                            <b>Ngành nghề phù hợp</b><br />
                            -   <i>Viết & Truyền thông:</i> nhà văn, nhà thơ, nhà báo (phóng viên, biên tập viên, bình luận viên), nhạc sỹ, nhà lý luận phê bình văn học / âm nhạc / điện ảnh, người sáng tác quảng cáo, tiếp thị, thiết kế mẫu mã hàng hóa, tổ chức triển lãm, sự kiện, thiết kế trưng bày.<br /><br />
                            -   <i>Nghệ thuật biểu diễn:</i> Ca sỹ, diễn viên điện ảnh / truyền hình / sân khấu, diễn viên múa, biên đạo múa, biểu diễn nhạc cụ, chỉ huy dàn nhạc, đạo diễn, chỉ đạo nghệ thuật, dẫn chương trình, phát thanh viên.<br /><br />
                            -   <i>Nghệ thuật hình ảnh & Tạo hình:</i> hội họa (họa sỹ), nhà mỹ thuật, điêu khắc, đồ họa vi tính, nhiếp ảnh gia, thiết kế thời trang, kiến trúc sư, thiết kế nội thất, ngoại thất, thiết kế phong cảnh.<br /><br />
                            -   <i>Các ngành nghề liên quan:</i> Nghệ thuật ẩm thực, quay phim, bảo tồn / bảo tàng, thủ công mỹ nghệ. <br /><br />
                        </div>
                    </div>        
                    @elseif ($tinhcach=='S')
                    <div class="wrap-ket-qua-phieuD">
                        <div class="wrap-thu-tu-D"></div>
                        <b>Bạn thuộc Nhóm S (Social): Nhóm xã hội – Người giúp đỡ</b><br /><br />
                        <div style="padding-left:15px;">
                            Họ thích giúp đỡ người khác với tinh thần thiện nguyện, luôn mong muốn một xã hội tốt đẹp hơn. Họ biết lắng nghe một cách tích cực, biết giảng giải huấn luyện cho mọi người. Họ thường tìm đọc các cuốn sách nhằm hoàn thiện bản thân. <br /><br />
                            Thường tránh các công việc phải sử dụng máy móc, thiết bị, hay những công việc bàn giấy đơn giản vì lý do các công việc đó không có nhiều cơ hội tiếp xúc, giao tiếp với mọi người<br /><br />
                            <b>Ngành nghề phù hợp</b><br />
                            -   <i>Khoa học xã hội:</i> Nhà tâm lý học, nhà ngôn ngữ học, nhà xã hội học, đô thị học, nhà sử học, khảo cổ học, nhà nhân học, nhà văn hóa, Việt Nam học, quốc tế học, chính trị học, triết học<br /><br />
                            -   <i>Tư vấn & Giúp đỡ:</i> Công tác xã hội, công tác đoàn đội, cứu trợ xã hội, tình nguyện viên, chăm sóc trẻ em, người già, người khuyết tật, bị thương, nhân viên phục vụ, chăm sóc khách hàng<br /><br />
                            -   <i>Giáo dục & Đào tạo:</i> Tư vấn hướng nghiệp, tư vấn giáo dục, tư vấn tâm lý, giáo viên, giảng viên, đào tạo các kiến thức, kỹ năng cho người lao động, an toàn lao động, huấn luyện viên thể thao<br /><br />
                            -   <i>Dịch vụ chăm sóc sức khỏe:</i> bác sỹ, y tá, điều dưỡng, chuyên viên vật lý trị liệu, y tế công cộng, y tế học đường, y học dự phòng, hộ sinh, dinh dưỡng học…<br /><br />
                            -       <i>Các ngành nghề liên quan:</i> Tôn giáo và tâm linh, thông tin, truyền thông, báo chí, xuất bản, du lịch, quản lý di tích, danh thắng, xã hội học, dịch vụ xã hội<br /><br />
                        </div>
                    </div>        
                    @elseif ($tinhcach=='E')
                    <div class="wrap-ket-qua-phieuE">
                        <div class="wrap-thu-tu-E"></div>
                        <b>Bạn thuộc Nhóm E (Enterprise): Nhóm mạnh bạo – Người thuyết phục</b><br /><br />
                        <div style="padding-left:15px;">
                            Đặc điểm nổi bật của nhóm tính cách này là sự tự tin, mạnh mẽ, thích phiêu lưu mạo hiểm, thích công việc có nhiều áp lực, có sự cạnh tranh. Họ có khả năng ăn nói và thuyết phục mọi người.<br /><br />
                            Họ là người nhiều năng lượng, tham vọng nhưng cũng rất hòa đồng và thích giao du.Họ thường thành công khi tham gia làm kinh doanh, lãnh đạo hay làm chính trị.<br /><br />
                            <b>Ngành nghề phù hợp</b><br />
                                    -   <i>Quản lý, kinh doanh:</i> Quản trị kinh doanh, quản trị doanh nghiệp, quản lý kinh tế, quản trị nhân sự, đại lý cung cấp các sản phẩm, môi giới chứng khoán, bất động sản, quản trị trung tâm đào tạo / trường học, quản trị công ty du lịch, khách sạn, nhà hàng<br /><br />
                                    -   <i>Marketing và Bán hàng:</i> Nghiên cứu thị trường, tiếp thị, bán hàng, truyền thông, quan hệ công chúng, tổ chức sự kiện<br /><br />
                                    -   <i>Chính trị và Diễn thuyết:</i> Nhà ngoại giao, chính trị gia, diễn giả…<br /><br />
                                    -   <i>Luật:</i> Luật sư, trợ lý pháp lý, sỹ quan cảnh sát<br /><br />
                                    -   <i>Các ngành nghề liên quan:</i> Tư vấn tài chính / tín dụng, kế toán trưởng<br /><br />
                        </div>
                    </div>                  
                    @else
                    <div class="wrap-ket-qua-phieuF">
                        <div class="wrap-thu-tu-F"></div>
                         <b>Bạn thuộc Nhóm C (Conventional): Nhóm tổ chức – Người tổ chức</b><br /><br />
                            <div style="padding-left:15px;">
                                Nhóm tính cách này thường rất tin cậy do tính cẩn thận, tỉ mỉ, ngăn nắp. Thường đúng hẹn, luôn tuân thủ quy định, quy trình, coi trọng truyền thống, ứng xử chừng mực, ôn hòa. <br /><br />
                                Họ thích làm việc với các con số, quản lý hồ sơ, sử dụng các thiết bị văn phòng. Thường giải quyết tốt các công việc khi đã được lập kế hoạch.<br /><br />
                            <b>Ngành nghề phù hợp</b><br />
                            -   <i>Quản trị văn phòng:</i> Quản trị văn phòng, thư ký văn phòng, hành chính, quản lý hồ sơ, nhân viên đánh máy, biên soạn hồ sơ, nhân viên lễ tân, điện thoại viên<br /><br />
                            -   <i>Tài chính, kế toán, đầu tư:</i> Tài chính, ngân hàng, đầu tư, kế toán, kiểm toán, nhân viên thuế, nhân viên thu ngân, quản lý quỹ, bán lẻ<br /><br />
                            -   <i>Thư viện, thông tin:</i> Thống kê, lưu trữ, thư viện, hệ thống thông tin<br /><br />
                            -   <i>Các ngành nghề liên quan:</i> Phát triển phần mềm, biên dịch, phiên dịch, giáo viên mầm non, một số vị trí công chức nhà nước, thanh tra, kiểm tra, nghề thợ thủ công<br /><br />
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection