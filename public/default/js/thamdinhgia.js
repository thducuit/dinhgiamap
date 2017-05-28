//dinh gia nang cao
function getOptions(val, ele) {
      $.ajax({
          url: '/public/structure',
          type: 'get',
          data: {
              id: val
          },
          success: function(response) {
              var select = '';
              $.each(response, function(i, data) {
                  select += '<option value="' + data.price + '">' + data.structure + '</option>';
              });
              ele.parent().parent().find('.structure_child:first').html(select);
          }
      });
  }
  function remove(object) {
      object.parentElement.remove();
      var heightOfRightBox = $('.zui-tabpanel-content').height();
      $('#modal_dinhgia .desktop .dinhgia_tabpanel .ztabpanel').height(heightOfRightBox);
  }
  jQuery(document).ready(function() {
    var formClass = '';
    jQuery(document.body).on('change', '.structure_parent', function() {
        var _this = jQuery(this);
        var val = _this.val();
        getOptions(val, _this);
    });
    jQuery('.btn_dinhgia').click(function(e) {
        e.preventDefault();
        $('.login-form .btn-login').attr('land-type', $(this).attr('land-type'));
        $('.register-form .btn-register').attr('land-type', $(this).attr('land-type'));
        formClass = jQuery(this).attr('data');
    });
  });
  jQuery('.clogin').click(function(e) {
        jQuery('.chooser').val('login');
        $(formClass).submit();
    });
    jQuery('.cnologin').click(function(e) {
        e.preventDefault();
        jQuery('.chooser').val('nologin');
        $(formClass).submit();
    });
    jQuery('#modal_dinhgia').modal('show');

    function setDinhGiaField() {}
    var quan = '';
    jQuery('.selectQuan, .selectVitri, .selectHinhDangThuaDat,' +
        '.textChieuNgang, .textDienTichDat').change(function() {
        quan = $(this).parents('.price-form').find('.textDistrict:first').val();

        var idOptionVitri = $(this).parents('.price-form').find('.selectVitri:first').val();
        var idOptionHinhDangThuaDat = $(this).parents('.price-form').find('.selectHinhDangThuaDat:first').val();
        var idOptionChieuNgang = null;
        var idOptionDienTichDat = null;
        var textChieuNgang = $(this).parents('.price-form').find('.textChieuNgang:first').val();
        var textDienTich = $(this).parents('.price-form').find('.textDienTichDat:first').val();
        var selectHemMaTien = 'mat_tien';
        var vitriData = '';
        var hinhDangThuaDatData = '';
        var yeuToKhacData = '';
        var chieuNgangData = '';
        var dienTichDatData = '';
        if (vitriOptions[idOptionVitri]) {
            if (quan == 'Quận 1' || quan == 'Quận 3') {
                vitriData = vitriOptions[idOptionVitri].quanTrungTam;
            } else {
                vitriData = vitriOptions[idOptionVitri].quanKhac;
            }
            if (vitriOptions[idOptionVitri].description.indexOf('hẻm') > -1) {
                selectHemMaTien = 'hem';
            }
        }
        $(this).parents('.price-form').find('.inputViTri:first').val(vitriData);
        if (hinhDangThuaDatOptions[idOptionHinhDangThuaDat]) {
            if (quan == 'Quận 1' || quan == 'Quận 3') {
                if (selectHemMaTien == 'mat_tien') {
                    hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanTrungTamMatTien;
                } else {
                    hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanTrungTamHem;
                }
            } else {
                if (selectHemMaTien == 'mat_tien') {
                    hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanKhacMatTien;
                } else {
                    hinhDangThuaDatData = hinhDangThuaDatOptions[idOptionHinhDangThuaDat].quanKhacHem;
                }
            }
        }
        $(this).parents('.price-form').find('.inputHinhDangThuaDat:first').val(hinhDangThuaDatData);
        for (var i in chieuNgangOptions) {
            var partPrice = chieuNgangOptions[i]['name'].split('<');
            if (!partPrice[0]) {
                if (partPrice[1] && textChieuNgang * 1 < partPrice[1] * 1) {
                    idOptionChieuNgang = i;
                    break;
                }
            } else {
                partPrice = chieuNgangOptions[i]['name'].split(' - <');
                if (partPrice[1]) {
                    if (textChieuNgang * 1 >= partPrice[0] * 1 && textChieuNgang * 1 < partPrice[1] * 1) {
                        idOptionChieuNgang = i;
                        break;
                    }
                } else {
                    partPrice = chieuNgangOptions[i]['name'].split('≥');
                    if (partPrice[1] && textChieuNgang * 1 >= partPrice[1]) {
                        idOptionChieuNgang = i;
                        break;
                    }
                }
            }
        }
        if (chieuNgangOptions[idOptionChieuNgang]) {
            if (quan == 'Quận 1' || quan == 'Quận 3') {
                if (selectHemMaTien == 'mat_tien') {
                    chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanTrungTamMatTien;
                } else {
                    chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanTrungTamHem;
                }
            } else {
                if (selectHemMaTien == 'mat_tien') {
                    chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanKhacMatTien;
                } else {
                    chieuNgangData = chieuNgangOptions[idOptionChieuNgang].quanKhacHem;
                }
            }
        }
        $(this).parents('.price-form').find('.inputChieuNgang:first').val(chieuNgangData);
        for (var i in dienTichDatOptions) {
            var partPrice = dienTichDatOptions[i]['name'].split('<');
            if (!partPrice[0]) {
                if (partPrice[1] && textDienTich * 1 < partPrice[1] * 1) {
                    idOptionDienTichDat = i;
                    break;
                }
            } else {
                partPrice = dienTichDatOptions[i]['name'].split(' - ');
                if (partPrice[1]) {
                    if (textDienTich * 1 >= partPrice[0] * 1 && textDienTich * 1 <= partPrice[1] * 1) {
                        idOptionDienTichDat = i;
                        break;
                    }
                } else {
                    partPrice = dienTichDatOptions[i]['name'].split('≥');
                    if (partPrice[1] && textDienTich * 1 >= partPrice[1]) {
                        idOptionDienTichDat = i;
                        break;
                    }
                }
            }
        }
        if (dienTichDatOptions[idOptionDienTichDat]) {
            if (quan == 'Quận 1' || quan == 'Quận 3') {
                if (selectHemMaTien == 'mat_tien') {
                    dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanTrungTamMatTien;
                } else {
                    dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanTrungTamHem;
                }
            } else {
                if (selectHemMaTien == 'mat_tien') {
                    dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanKhacMatTien;
                } else {
                    dienTichDatData = dienTichDatOptions[idOptionDienTichDat].quanKhacHem;
                }
            }
        }
        $(this).parents('.price-form').find('.inputDienTichDat:first').val(dienTichDatData);
    });
    $('.selectYeuToKhac').change(function() {
        var idOptions = $(this).val();
        var inputs = '';
        var yeuToKhacData = '';
        if (idOptions && idOptions.length) {
            for (var i = 0; i < idOptions.length; i++) {
                if (yeuToKhacOptions[idOptions[i]]) {
                    if (quan == 'Quận 1' || quan == 'Quận 3') {
                        yeuToKhacData = yeuToKhacOptions[idOptions[i]].quanTrungTam;
                    } else {
                        yeuToKhacData = yeuToKhacOptions[idOptions[i]].quanKhac;
                    }
                }
                inputs += '<input type="hidden" name="yeuToKhac[]"  value="' + yeuToKhacData + '"/>';
            }
        } else {
            inputs += '<input type="hidden" name="yeuToKhac[]"  value="' + yeuToKhacData + '"/>';
        }
        $(this).parent().find('.box-input-yeutokhac:first').html(inputs);
    });
    var optionsKetCauChinh = '';
    $('.selectCongTrinhXayDung').change(function() {
        var congTrinh = $(this).val();
        if (congTrinh) {            
            $('.row-ket-cau-chinh').show();            
        } else {
            $('.row-ket-cau-chinh').hide();
        }
    });
    $('.cacLoaiDatKhac').change(function() {
        if ($(this).is(":checked")) {
            $(".isShownCacLoaiDatKhac").show();
        } else {
            $(".isShownCacLoaiDatKhac").hide();
        }
    });
    setTimeout(function() {
        $('.row-ket-cau-chinh').hide();
    }, 2000);

  $('.form_add_row_wrapper').click(function() {
        var ketCauType = $(this).attr('type');
        var ketCauOptions = '';
        if (ketCauType == 'nha_pho') {
            ketCauOptions = ketCauChinhNhaPhoOptions;
        } else if (ketCauType == 'can_ho') {
            ketCauOptions = ketCauChinhCanHoOptions;
        } else if (ketCauType == 'khach_san') {
            ketCauOptions = ketCauChinhKhachSanOptions;
        } else if (ketCauType == 'toa_nha_van_phong') {
            ketCauOptions = ketCauChinhToaNhaVanPhongOptions;
        }
        var rowKetCauChinh = '<div class="form_row clearfix row-ket-cau-chinh">' +
            '<span onclick="remove(this)">&times;</span>' +
            '<div class="form_col form_col2">' +
            '<label>Kết cấu chính</label>' +
            '<select name="structureMore[]" id="">' + ketCauOptions + '</select>' +
            '</div>' +
            '<div class="form_col">' +
            '<label>Tổng diện tích sàn xd</label>' +
            '<input type="text" placeholder="" name="total_ground_area_more[]" value="">' +
            '</div>' +
            '<div class="form_col">' +
            '<label>Năm xây dựng</label>' +
            '<input type="hidden" name="year_building_more[]" class="namXD1">' +
            '<input type="text" name="textNamXDMore[]" class="textNamXD"/>' +
            '</div>' +
            '</div>';
        $(this).after(rowKetCauChinh);
        var heightOfRightBox = $(this).parents('.zui-tabpanel-content').height();
        $('#modal_dinhgia .desktop .dinhgia_tabpanel .ztabpanel').height(heightOfRightBox);
    });
    $('.form_add_row_wrapper_kho_xuong').click(function() {
        var rowKetCauChinh = '<div class="form_row clearfix row-ket-cau-chinh">' +
            '<span onclick="remove(this)">&times;</span>' +
            '<div class="form_col">' +
            '<label>Loại CTXD</label>' +
            '<select name="structureParentMore[]"  class="structure_parent">' +
            optionsKetCauChinhKhoXuong+
        '</select>' +
        '</div>' +
        '<div class="form_col">' +
        '<label>Kết cấu chính</label>' +
        '<select name="structureMore[]" class="structure_child">' +
          optionsChildKhoXuong+
        '</select>' +
        '</div>' +
        '<div class="form_col">' +
        '<label>Tổng diện tích sàn xd</label>' +
        '<input type="text" placeholder="" name="total_ground_area_more[]" value="">' +
        '</div>' +
        '<div class="form_col">' +
        '<label>Năm xây dựng</label>' +
        '<input type="hidden" name="year_building_more[]" class="namXD1">' +
        '<input type="text" name="textNamXDMore[]" class="textNamXD"/>' +
        '</div>' +
        '</div>';
        $(this).after(rowKetCauChinh);
        var heightOfRightBox = $(this).parents('.zui-tabpanel-content').height();
        $('#modal_dinhgia .desktop .dinhgia_tabpanel .ztabpanel').height(heightOfRightBox);
    });
    $('#modal_dinhgia .dinhgia_tabpanel .ztabpanel li').click(function() {
        setTimeout(function() {
            var heightOfRightBox = $('#modal_dinhgia .zui-tabpanel-content.zui-active').height();
            var heightOfWrapRightBox = $('#modal_dinhgia .zui-tabpanel-content-wrapper').height();;
            var heightOfLeftMenu = heightOfWrapRightBox;
            if (heightOfWrapRightBox < heightOfRightBox) {
                heightOfLeftMenu = heightOfRightBox;
            }
            $('#modal_dinhgia .desktop .dinhgia_tabpanel .ztabpanel').height(heightOfLeftMenu);
        }, 1000);
    });
    jQuery(document.body).on('keyup', '.textNamXD', function(event) {
        var textNamXD = $(this).val();
        if (textNamXD.length == 4) {
            if (namXDOptions[textNamXD]) {
                $(this).parent().find(".namXD1:first").val(namXDOptions[textNamXD]);
            }
        }
    });  
    $('.selectYeuToKhac').trigger('change');
    $('.selectYeuToKhac').multiselect({
        buttonText: function(options, select) {
            return 'Chọn yếu tố khác';
        }
    });