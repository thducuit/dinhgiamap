@extends('default.layouts.default')
@section('content')
<!--
/*==============================*\
MAIN
/*==============================*\
-->
<div id="main" class="screen">
    <div class="main_wrapper">

        <div class="block_overlay">
            <!--
            SEARCH BOX
            -->
            <div id="search_box">
                <div class="search_box_inner">
                    <form class="clearfix">
                        <div class="form_group form_group_icon_location"><i class="icon_location"></i></div>
                        <div class="form_group form_group_input_text">
                            <input class="input_text" type="text" value=""
                                   placeholder="Nhập địa chỉ tài sản để định giá">
                        </div>
                        <div class="form_group form_group_submit">
                            <input class="input_submit" type="submit" value="Tìm kiếm">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--
        MAP VIEW
        -->
        <div id="map_view">

        </div>


    </div>
</div>


<!-- POPUP XEM QUI HOACH -->
<div class="zpopup" id="popup_xemquihoach" data-option="animate:true,animateName:'bounceInDown bounceOutUp'">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19493.074154720616!2d106.72666343549284!3d10.809278953816108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175263d580e4583%3A0x6d25e042c3aed063!2zVGjhuqNvIMSQaeG7gW4sIERpc3RyaWN0IDIsIEhvIENoaSBNaW5oLCBWaWV0bmFt!5e1!3m2!1sen!2s!4v1471949137130"
        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div id="modal_info_tai_san_cung_don_gia" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal_info_inner clearfix">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="popup_map" id="popup_tai_san_cung_don_gia">
                        <div class="popup_map_inner clearfix">
                            <div class="popup_left">
                                <div class="property_title">Bán nhà phố Quận 2</div>
                                <div class="property_address">Khu vực: Quận 2, TP.Hồ Chí Minh</div>
                                <div class="property_info_row clearfix">
                                    <div class="property_info_left">Diện tích đất</div>
                                    <div class="property_info_right">200m<sup>2</sup></div>
                                </div>
                                <div class="property_info_row clearfix">
                                    <div class="property_info_left">Diện tích sử dụng</div>
                                    <div class="property_info_right">400m<sup>2</sup></div>
                                </div>
                                <div class="property_info_row clearfix">
                                    <div class="property_info_left">Giá rao bán</div>
                                    <div class="property_info_right">2.8 tỷ</div>
                                </div>
                            </div>
                            <div class="popup_right">
                                <div class="property_thumbbnail"
                                     style="background: url(images/hinh_taisancungdongia_35823583.png) center no-repeat; background-size: cover;"></div>
                                <div class="popup_button_group">
                                    <a href="{{ URL::to('/chi-tiet-tai-san-dang-giao-dich.html') }}">
                                        <div class="btn btn_icon btn_gradient4"><i class="icon_cungdongia"></i><span>Xem chi tiết</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn_close_popup" data-dismiss="modal"></button>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script> -->
{{ HTML::script('default/js/infobox.js') }}
{{ HTML::script('default/js/real.js') }}
@endsection