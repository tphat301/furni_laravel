$(document).ready(function () {
  /*Handle generate slug*/
  function removeSpecialCharacter(str) {
    str = str.toLowerCase();
    str = str.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    str = str.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    str = str.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    str = str.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    str = str.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    str = str.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    str = str.replace(/đ/gi, "d");
    str = str.replace(
      /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
      ""
    );
    str = str.replace(/ /gi, "-");
    str = str.replace(/\-\-\-\-\-/gi, "-");
    str = str.replace(/\-\-\-\-/gi, "-");
    str = str.replace(/\-\-\-/gi, "-");
    str = str.replace(/\-\-/gi, "-");
    return str;
  }

  function generateSlug(value) {
    return removeSpecialCharacter(value).replace(/\s/g, "-");
  }

  if ($(".for-seo")) {
    $(".for-seo").keyup(function (event) {
      const { value } = event.target;
      if (value) {
        $(".slug-seo").attr("value", generateSlug(value));
        $(".slug-seo").attr("readonly", true);
      } else {
        $(".slug-seo").attr("value", "");
        $(".slug-seo").attr("readonly", false);
      }
    });
  }

  /*Build SEO Automation*/
  function htmlToText(value) {
    const text = value
      .replace(/<style([\s\S]*?)<\/style>/gi, " ")
      .replace(/<script([\s\S]*?)<\/script>/gi, " ")
      .replace(/(<(?:.|\n)*?>)/gm, " ")
      .replace(/\s+/gm, " ");
    return text;
  }

  if ($(".build-seo")) {
    $(".build-seo").click(function () {
      const title = $(this)
        .parents(".content")
        .find(".card-body.card-article #title")
        .val();

      const titleSeo = $(this)
        .parents(".card-header")
        .next()
        .children()
        .find("#title_seo");

      const keywordSeo = $(this)
        .parents(".card-header")
        .next()
        .children()
        .find("#keywords_seo");

      const descSeo = $(this)
        .parents(".card-header")
        .next()
        .children()
        .find("#description_seo");

      const desc = $(this)
        .parents(".content")
        .find(".card-body.card-article #desc")
        .val();
      if (title) {
        titleSeo.val(title);
        keywordSeo.val(title);
      } else {
        titleSeo.val("");
        keywordSeo.val("");
      }
      desc ? descSeo.val(htmlToText(desc)) : descSeo.val("");
    });
  }

  /*Handle format price*/
  if ($(".format-price").length) {
    $(".format-price").priceFormat({
      limit: 13,
      prefix: "",
      centsLimit: 0,
    });
  }

  /* Rounde number */
  function roundNumber(roundNumber, roundLength) {
    return (
      Math.round(roundNumber * Math.pow(10, roundLength)) /
      Math.pow(10, roundLength)
    );
  }

  /*Hanlde generate discount*/
  if ($(".regular_price").length && $(".sale_price").length) {
    $(".sale_price").keyup(function () {
      $(".regular_price").prop("disabled", false);
      let price3 = $(this).val();
      let price2 = price3.replace(",", "");
      let price1 = price2.replace(",", "");
      let price = price1.replace(",", "");
      $(this).attr("value", price);
    });
    $(".sale_price").blur(function () {
      let key = $(".sale_price").attr("value");
      if (key > 0) {
        $(".regular_price").prop("disabled", false);
      } else {
        $(".regular_price").val(0);
        $(".regular_price").prop("disabled", true);
      }
    });
    $(".regular_price, .sale_price").keyup(function () {
      let regularPriceValue = $(".regular_price").val();
      let salePriceValue = $(".sale_price").length ? $(".sale_price").val() : 0;
      let discountNumber = 0;

      if (
        regularPriceValue == "" ||
        regularPriceValue == "0" ||
        salePriceValue == "" ||
        salePriceValue == "0"
      ) {
        discountNumber = 0;
      } else {
        regularPriceValue = regularPriceValue.replace(/,/g, "");
        salePriceValue = salePriceValue ? salePriceValue.replace(/,/g, "") : 0;
        regularPriceValue = parseInt(regularPriceValue);
        salePriceValue = parseInt(salePriceValue);

        if (salePriceValue < regularPriceValue) {
          discountNumber = 100 - (salePriceValue * 100) / regularPriceValue;
          discountNumber = roundNumber(discountNumber, 0);
        } else {
          if ($(".discount").length) {
            discountNumber = 0;
          }
        }
      }
      if ($(".discount").length) {
        $(".discount").val(discountNumber);
      }
    });
  }

  /* Reader image */
  function readImage(inputFile, elementPhoto) {
    if (inputFile[0].files[0]) {
      if (inputFile[0].files[0].name.match(/.(jpg|jpeg|png|gif|webp)$/i)) {
        let size = parseInt(inputFile[0].files[0].size) / 1024;

        if (size <= 4096) {
          let reader = new FileReader();
          reader.onload = function (e) {
            $(elementPhoto).attr("src", e.target.result);
          };
          reader.readAsDataURL(inputFile[0].files[0]);
        } else {
          alert("Dung lượng ảnh lớn hơn dung lượng cho phép 4096kb");
          return false;
        }
      } else {
        $(elementPhoto).attr("src", "");
        alert("Định dạng hình ảnh không hợp lệ");
        return false;
      }
    } else {
      $(elementPhoto).attr("src", `${BASE_URL}public/images/noimage.png`);
      return false;
    }
  }
  /*Photo Zone*/
  function photoZone(eDrag, iDrag, eLoad) {
    if ($(eDrag).length) {
      /* Drag over */
      $(eDrag).on("dragover", function () {
        $(this).addClass("drag-over");
        return false;
      });

      /* Drag leave */
      $(eDrag).on("dragleave", function () {
        $(this).removeClass("drag-over");
        return false;
      });

      /* Drop */
      $(eDrag).on("drop", function (e) {
        e.preventDefault();
        $(this).removeClass("drag-over");
        var lengthZone = e.originalEvent.dataTransfer.files.length;
        if (lengthZone == 1) {
          $(iDrag).prop("files", e.originalEvent.dataTransfer.files);
          readImage($(iDrag), eLoad);
        } else if (lengthZone > 1) {
          alert("Bạn chỉ được chọn 1 hình ảnh để upload");
          return false;
        } else {
          alert("Dữ liệu không hợp lệ");
          return false;
        }
      });

      /* File zone */
      $(iDrag).change(function () {
        readImage($(this), eLoad);
      });
    }
  }
  /*Preview photo1*/
  if ($("#photo-zone1").length) {
    photoZone("#photo-zone1", "#file-zone1", "#photoUpload-preview1 img");
  }
  /*Preview photo2*/
  if ($("#photo-zone2").length) {
    photoZone("#photo-zone2", "#file-zone2", "#photoUpload-preview2 img");
  }
  /*Preview photo3*/
  if ($("#photo-zone3").length) {
    photoZone("#photo-zone3", "#file-zone3", "#photoUpload-preview3 img");
  }
  /*Preview photo4*/
  if ($("#photo-zone4").length) {
    photoZone("#photo-zone4", "#file-zone4", "#photoUpload-preview4 img");
  }

  /*Handle check all && checkitem*/
  if ($(".checkall") && $(".checkitem")) {
    $(".checkall").change(function () {
      $(this).prop("checked") === true
        ? $(".checkitem").prop("checked", true)
        : $(".checkitem").prop("checked", false);
    });
    $(".checkitem").change(function () {
      const itemIsChecked = $('input[name="checkitem[]"]:checked');
      itemIsChecked.length && $(".checkitem").length === itemIsChecked.length
        ? $(".checkall").prop("checked", true)
        : $(".checkall").prop("checked", false);
    });
  }

  /* Notify */
  function notifyDialog(
    content = "",
    title = "Thông báo",
    icon = "fas fa-exclamation-triangle",
    type = "blue"
  ) {
    $.alert({
      title: title,
      icon: icon, // font awesome
      type: type, // red, green, orange, blue, purple, dark
      content: content, // html, text
      backgroundDismiss: true,
      animationSpeed: 600,
      animation: "zoom",
      closeAnimation: "scale",
      typeAnimated: true,
      animateFromElement: false,
      autoClose: "accept|3000",
      escapeKey: "accept",
      buttons: {
        accept: {
          text: '<i class="fas fa-check align-middle mr-2"></i>Đồng ý',
          btnClass: "btn-blue btn-sm bg-gradient-primary",
        },
      },
    });
  }

  /* ConfirmDialog */
  function confirmDialog(
    action,
    text,
    value,
    title = "Thông báo",
    icon = "fas fa-exclamation-triangle",
    type = "blue"
  ) {
    $.confirm({
      title: title,
      icon: icon, // font awesome
      type: type, // red, green, orange, blue, purple, dark
      content: text, // html, text
      backgroundDismiss: true,
      animationSpeed: 600,
      animation: "zoom",
      closeAnimation: "scale",
      typeAnimated: true,
      animateFromElement: false,
      autoClose: "cancel|3000",
      escapeKey: "cancel",
      buttons: {
        success: {
          text: '<i class="fas fa-check align-middle mr-2"></i>Đồng ý',
          btnClass: "btn-blue btn-sm bg-gradient-primary",
          action: function () {
            // if (action == "delete-photo") document.location = value;
            // if (action == "delete-photo2") document.location = value;
            if (action == "delete-row") document.location = value;
            // if (action == "restore-item") document.location = value;
            // if (action == "restore-all") {
            //   if ($(".form-product-list").length) {
            //     $(".form-product-list").attr("action", value);
            //     $(".form-product-list").submit();
            //   }
            // }
          },
        },
        cancel: {
          text: '<i class="fas fa-times align-middle mr-2"></i>Hủy',
          btnClass: "btn-red btn-sm bg-gradient-danger",
        },
      },
    });
  }

  /* Handle Delete One Row */
  if ($("#delete-row").length) {
    $("body").on("click", "#delete-row", function () {
      const url = $(this).data("url");
      confirmDialog("delete-row", "Bạn có chắc muốn xóa mục này không ?", url);
    });
  }

  /* Handle Delete All Data */
  if ($("#delete-all").length) {
    $("body").on("click", "#delete-all", function () {
      const itemIsChecked = $('input[name="checkitem[]"]:checked');
      if (itemIsChecked) {
        if (itemIsChecked.length === 0) {
          notifyDialog("Bạn hãy chọn ít nhất 1 mục để xóa");
          return false;
        } else {
          confirm("Bạn có chắc muốn xóa mục này không ?");
        }
      }
    });
  }
});
