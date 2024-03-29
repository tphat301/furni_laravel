!(function (S) {
  (S.fn.priceFormat = function (x) {
    x = S.extend(
      {
        prefix: "US$ ",
        suffix: "",
        centsSeparator: ".",
        thousandsSeparator: ",",
        limit: !1,
        centsLimit: 2,
        clearPrefix: !1,
        clearSufix: !1,
        allowNegative: !1,
        insertPlusSign: !1,
        clearOnEmpty: !1,
      },
      x
    );
    return this.each(function () {
      var r = S(this),
        c = "",
        u = /[0-9]/;
      c = r.is("input") ? r.val() : r.html();
      var f = x.prefix,
        s = x.suffix,
        h = x.centsSeparator,
        l = x.thousandsSeparator,
        p = x.limit,
        m = x.centsLimit,
        t = x.clearPrefix,
        n = x.clearSuffix,
        v = x.allowNegative,
        _ = x.insertPlusSign,
        d = x.clearOnEmpty;
      function o(t) {
        r.is("input") ? r.val(t) : r.html(t);
      }
      function i() {
        return (c = r.is("input") ? r.val() : r.html());
      }
      function g(t, r) {
        if (!r && ("" === t || t == g("0", !0)) && d) return "";
        var n = (function (t) {
            for (; t.length < m + 1; ) t = "0" + t;
            return t;
          })(
            (function (t) {
              for (var r = "", n = 0; n < t.length; n++)
                (char_ = t.charAt(n)),
                  0 == r.length && 0 == char_ && (char_ = !1),
                  char_ &&
                    char_.match(u) &&
                    (p ? r.length < p && (r += char_) : (r += char_));
              return r;
            })(t)
          ),
          i = "",
          e = 0;
        0 == m && (a = h = "");
        var a = n.substr(n.length - m, m),
          c = n.substr(0, n.length - m);
        if (((n = 0 == m ? c : c + h + a), l || "" != S.trim(l))) {
          for (var o = c.length; 0 < o; o--)
            (char_ = c.substr(o - 1, 1)),
              ++e % 3 == 0 && (char_ = l + char_),
              (i = char_ + i);
          i.substr(0, 1) == l && (i = i.substring(1, i.length)),
            (n = 0 == m ? i : i + h + a);
        }
        return (
          !v ||
            (0 == c && 0 == a) ||
            (n =
              -1 != t.indexOf("-") && t.indexOf("+") < t.indexOf("-")
                ? "-" + n
                : _
                ? "+" + n
                : "" + n),
          f && (n = f + n),
          s && (n += s),
          n
        );
      }
      function e() {
        var t = i(),
          r = g(t);
        t != r && o(r), 0 == parseFloat(t) && d && o("");
      }
      function a() {
        "" != S.trim(f) && t && o(i().split(f)[1]);
      }
      function b() {
        "" != S.trim(s) && n && o(i().split(s)[0]);
      }
      _ && (v = !0),
        r.bind("keydown.price_format", function (t) {
          var r = t.keyCode ? t.keyCode : t.which,
            n = String.fromCharCode(r),
            i = !1,
            e = c,
            a = g(e + n);
          ((48 <= r && r <= 57) || (96 <= r && r <= 105)) && (i = !0),
            8 == r && (i = !0),
            9 == r && (i = !0),
            13 == r && (i = !0),
            46 == r && (i = !0),
            37 == r && (i = !0),
            39 == r && (i = !0),
            !v || (189 != r && 109 != r && 173 != r) || (i = !0),
            !_ || (187 != r && 107 != r && 61 != r) || (i = !0),
            i || (t.preventDefault(), t.stopPropagation(), e != a && o(a));
        }),
        r.bind("keyup.price_format", e),
        r.bind("focusout.price_format", e),
        t &&
          (r.bind("focusout.price_format", function () {
            a();
          }),
          r.bind("focusin.price_format", function () {
            r.val(f + i());
          })),
        n &&
          (r.bind("focusout.price_format", function () {
            b();
          }),
          r.bind("focusin.price_format", function () {
            r.val(i() + s);
          })),
        0 < i().length && (e(), a(), b());
    });
  }),
    (S.fn.unpriceFormat = function () {
      return S(this).unbind(".price_format");
    }),
    (S.fn.unmask = function () {
      var t,
        r = "";
      for (var n in (t = S(this).is("input") ? S(this).val() : S(this).html()))
        (isNaN(t[n]) && "-" != t[n]) || (r += t[n]);
      return r;
    });
})(jQuery);
