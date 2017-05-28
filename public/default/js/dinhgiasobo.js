jQuery(document).ready(function () {
  jQuery('#modal_dongiasobo  .selectVitri,#modal_dongiasobo  .selectHinhDangThuaDat,' +
          '#modal_dongiasobo  .textChieuNgang,#modal_dongiasobo  .textDienTichDat').change(function () {
    var quan = $(this).parents('.price-form').find('.textDistrict:first').val();
    var idOptionVitri = $(this).parents('.price-form').find('.selectVitri:first').val();
    var idOptionHinhDangThuaDat = $(this).parents('.price-form').find('.selectHinhDangThuaDat:first').val();
    var idOptionChieuNgang = null;
    var idOptionDienTichDat = null;
    var textChieuNgang = $(this).parents('.price-form').find('.textChieuNgang:first').val();
    var textDienTich = $(this).parents('.price-form').find('.textDienTichDat:first').val();
    var selectHemMaTien = 'mat_tien';
    var vitriData = '';
    var hinhDangThuaDatData = '';
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

  $('#modal_dongiasobo #btn_dinhgiasobo').unbind().click(function () {
    $('.error-dongiasobo').html('');
    //Gia tri dat
    var viTri = $('#modal_dongiasobo .inputViTri').val();
    var hinhDangThuaDat = $('#modal_dongiasobo .inputHinhDangThuaDat').val();
    var chieuNgang = $('#modal_dongiasobo .inputChieuNgang').val();
    var dienTichDat = $('#modal_dongiasobo .inputDienTichDat').val();
    var dienTichDatText = $('#modal_dongiasobo .textDienTichDat').val();
    var giaThiTruong = $('#modal_dongiasobo .giaThiTruong').val();
    var textChieuNgang = $('#modal_dongiasobo .textChieuNgang').val();
    var textChieuDai = $('#modal_dongiasobo .textChieuDai').val();
    var ctxd = $('#modal_dongiasobo .selectCongTrinhXayDung').val();
    var hasError = false;
    if (!dienTichDatText) {
      hasError = true;
      $('.error-dongiasobo').append('<li>Vui lòng nhập Tổng diện tích</li>');
    }
    if (!textChieuNgang) {
      hasError = true;
      $('.error-dongiasobo').append('<li>Vui lòng nhập Chiều ngang mặt tiền</li>');
    }
    if (!textChieuDai) {
      hasError = true;
      $('.error-dongiasobo').append('<li>Vui lòng nhập Chiều dài lớn nhất</li>');
    }
    giaThiTruong = giaThiTruong.replace(/\,/gm, '');
    //giá trị công trình xây dựng
    var ketCauChinh = $('#modal_dongiasobo .selectKetCauChinh').val();
    var dienTichSanXD = $('#modal_dongiasobo .dien-tich-san-xd').val();
    var namXayDung = $('#modal_dongiasobo .namXD').val();
    if (ctxd) {
      if (!dienTichSanXD) {
        $('.error-dongiasobo').append('<li>Vui lòng nhập Tổng diện tích sàn xd</li>');
        hasError = true;
      }
      if (!namXayDung) {
        $('.error-dongiasobo').append('<li>Vui lòng nhập Năm xây dựng</li>');
        hasError = true;
      }
    }
    if (!hasError) {
      $.post(url.donGiaSoBo, {
        giaThiTruong: giaThiTruong,
        viTri: viTri,
        hinhDangThuaDat: hinhDangThuaDat,
        chieuNgang: chieuNgang,
        dienTichDat: dienTichDat,
        dienTichDatText: dienTichDatText,
        ketCauChinh: ketCauChinh,
        dienTichSanXD: dienTichSanXD,
        namXayDung: namXayDung
      }, function (data) {
        var giaSauDieuChinh = data.giaSauDieuChinh;
        var giaTriDat = data.giaTriDat;
        var giaTriCTXD = data.giaTriCTXD;
        var tongGiaTriSoBo = data.tongGiaTriSoBo;
        $('#modal_ketqua_dongiasobo .giaThiTruong').html(giaSauDieuChinh.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1.'));
        $('#modal_ketqua_dongiasobo .giaTriDat').html(giaTriDat.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1.'));
        $('#modal_ketqua_dongiasobo .giaTriCTXD').html(giaTriCTXD.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1.'));
        $('#modal_ketqua_dongiasobo .tongGiaTriSoBo').html(tongGiaTriSoBo.toFixed(0).replace(/(\d)(?=(\d{3})+\b)/g, '$1.'));
        $('.tongDienTichLabel').html(dienTichDatText);
        $('.chieuNgangLabel').html(textChieuNgang);
        $('.chieuDaiLabel').html(textChieuDai);
        $('.vitriLabel').html($('#modal_dongiasobo .selectVitri option:selected').text());
        $('.hinhDangLabel').html($('#modal_dongiasobo .selectHinhDangThuaDat option:selected').text());
        $('.CTXDLabel').html($('#modal_dongiasobo .selectCongTrinhXayDung option:selected').text());
        if (ctxd) {
          $('.ctxd-input-shown').show();
          $('.ketCauLabel').html($('#modal_dongiasobo .selectKetCauChinh option:selected').text());
          $('.tongDienTichSanLabel').html(dienTichSanXD);
          $('.namXDLabel').html($('.textNamXD').val());
        } else {
          $('.ketCauLabel').html('');
          $('.tongDienTichSanLabel').html('');
          $('.namXDLabel').html('');
          $('.ctxd-input-shown').hide();
        }
        $('#modal_dongiasobo').modal('show');
        $('#modal_ketqua_dongiasobo').modal('show');
      });
    }
  });

  $('.textNamXD').keyup(function () {
    var textNamXD = $(this).val();
    if (textNamXD.length == 4) {
      if (namXDOptions[textNamXD]) {
        $('.namXD').val(namXDOptions[textNamXD]);
      }
    }
  });
  $('.selectCongTrinhXayDung').change(function () {
    var congTrinh = $(this).val();
    if (congTrinh) {
      $('.selectKetCauChinh').removeAttr('disabled');
      $('.dien-tich-san-xd').removeAttr('disabled');
      $('.textNamXD').removeAttr('disabled');
      var options = '';
      if (congTrinh == 'nha_pho') {
        for (var i in ketCauChinhOptions) {
          if (i < 5) {
            options += '<option value="' + ketCauChinhOptions[i].price + '">' + ketCauChinhOptions[i].label + '</option>';
          }
        }
      } else if (congTrinh == 'biet_thu') {
        for (var i in ketCauChinhOptions) {
          if (i >= 5) {
            options += '<option value="' + ketCauChinhOptions[i].price + '">' + ketCauChinhOptions[i].label + '</option>';
          }
        }
      }
      $('.row-ket-cau-chinh').show();
      $('.selectKetCauChinh').html(options);
    } else {
      $('.row-ket-cau-chinh').hide();
      $('.selectKetCauChinh').attr('disabled', 'true');
      $('.dien-tich-san-xd').attr('disabled', 'true');
      $('.textNamXD').attr('disabled', 'true');
    }
  });
});