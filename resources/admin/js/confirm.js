!(function (i) {
  "function" == typeof define && define.amd
    ? define(["jquery"], i)
    : "object" == typeof module && module.exports
    ? (module.exports = function (t, n) {
        return (
          void 0 === n &&
            (n =
              "undefined" != typeof window
                ? require("jquery")
                : require("jquery")(t)),
          i(n),
          n
        );
      })
    : i(jQuery);
})(function (r) {
  "use strict";
  var l = window;
  (r.fn.confirm = function (s, t) {
    return (
      void 0 === s && (s = {}),
      "string" == typeof s && (s = { content: s, title: t || !1 }),
      r(this).each(function () {
        var e = r(this);
        e.attr("jc-attached")
          ? console.warn(
              "jConfirm has already been attached to this element ",
              e[0]
            )
          : (e.on("click", function (t) {
              t.preventDefault();
              var n,
                i,
                o = r.extend({}, s);
              e.attr("data-title") && (o.title = e.attr("data-title")),
                e.attr("data-content") && (o.content = e.attr("data-content")),
                void 0 === o.buttons && (o.buttons = {}),
                (o.$target = e).attr("href") &&
                  0 === Object.keys(o.buttons).length &&
                  ((n = r.extend(
                    !0,
                    {},
                    l.jconfirm.pluginDefaults.defaultButtons,
                    (l.jconfirm.defaults || {}).defaultButtons || {}
                  )),
                  (i = Object.keys(n)[0]),
                  (o.buttons = n),
                  (o.buttons[i].action = function () {
                    location.href = e.attr("href");
                  })),
                (o.closeIcon = !1);
              r.confirm(o);
            }),
            e.attr("jc-attached", !0));
      }),
      r(this)
    );
  }),
    (r.confirm = function (t, n) {
      void 0 === t && (t = {}),
        "string" == typeof t && (t = { content: t, title: n || !1 });
      var i,
        o = !(!1 === t.buttons);
      return (
        "object" != typeof t.buttons && (t.buttons = {}),
        0 === Object.keys(t.buttons).length &&
          o &&
          ((i = r.extend(
            !0,
            {},
            l.jconfirm.pluginDefaults.defaultButtons,
            (l.jconfirm.defaults || {}).defaultButtons || {}
          )),
          (t.buttons = i)),
        l.jconfirm(t)
      );
    }),
    (r.alert = function (t, n) {
      void 0 === t && (t = {}),
        "string" == typeof t && (t = { content: t, title: n || !1 });
      var i,
        o,
        e = !(!1 === t.buttons);
      return (
        "object" != typeof t.buttons && (t.buttons = {}),
        0 === Object.keys(t.buttons).length &&
          e &&
          ((i = r.extend(
            !0,
            {},
            l.jconfirm.pluginDefaults.defaultButtons,
            (l.jconfirm.defaults || {}).defaultButtons || {}
          )),
          (o = Object.keys(i)[0]),
          (t.buttons[o] = i[o])),
        l.jconfirm(t)
      );
    }),
    (r.dialog = function (t, n) {
      return (
        void 0 === t && (t = {}),
        "string" == typeof t &&
          (t = { content: t, title: n || !1, closeIcon: function () {} }),
        (t.buttons = {}),
        void 0 === t.closeIcon && (t.closeIcon = function () {}),
        (t.confirmKeys = [13]),
        l.jconfirm(t)
      );
    }),
    (l.jconfirm = function (t) {
      void 0 === t && (t = {});
      var n = r.extend(!0, {}, l.jconfirm.pluginDefaults);
      l.jconfirm.defaults && (n = r.extend(!0, n, l.jconfirm.defaults)),
        (n = r.extend(!0, {}, n, t));
      var i = new l.Jconfirm(n);
      return l.jconfirm.instances.push(i), i;
    }),
    (l.Jconfirm = function (t) {
      r.extend(this, t), this._init();
    }),
    (l.Jconfirm.prototype = {
      _init: function () {
        var t = this;
        l.jconfirm.instances.length ||
          (l.jconfirm.lastFocused = r("body").find(":focus")),
          (this._id = Math.round(99999 * Math.random())),
          (this.contentParsed = r(document.createElement("div"))),
          this.lazyOpen ||
            setTimeout(function () {
              t.open();
            }, 0);
      },
      _buildHTML: function () {
        var t = this;
        this._parseAnimation(this.animation, "o"),
          this._parseAnimation(this.closeAnimation, "c"),
          this._parseBgDismissAnimation(this.backgroundDismissAnimation),
          this._parseColumnClass(this.columnClass),
          this._parseTheme(this.theme),
          this._parseType(this.type);
        var n = r(this.template);
        n
          .find(".jconfirm-box")
          .addClass(this.animationParsed)
          .addClass(this.backgroundDismissAnimationParsed)
          .addClass(this.typeParsed),
          this.typeAnimated &&
            n.find(".jconfirm-box").addClass("jconfirm-type-animated"),
          this.useBootstrap
            ? (n.find(".jc-bs3-row").addClass(this.bootstrapClasses.row),
              n
                .find(".jc-bs3-row")
                .addClass(
                  "justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-center"
                ),
              n
                .find(".jconfirm-box-container")
                .addClass(this.columnClassParsed),
              this.containerFluid
                ? n
                    .find(".jc-bs3-container")
                    .addClass(this.bootstrapClasses.containerFluid)
                : n
                    .find(".jc-bs3-container")
                    .addClass(this.bootstrapClasses.container))
            : n.find(".jconfirm-box").css("width", this.boxWidth),
          this.titleClass &&
            n.find(".jconfirm-title-c").addClass(this.titleClass),
          n.addClass(this.themeParsed);
        var i = "jconfirm-box" + this._id;
        n.find(".jconfirm-box").attr("aria-labelledby", i).attr("tabindex", -1),
          n.find(".jconfirm-content").attr("id", i),
          null !== this.bgOpacity &&
            n.find(".jconfirm-bg").css("opacity", this.bgOpacity),
          this.rtl && n.addClass("jconfirm-rtl"),
          (this.$el = n.appendTo(this.container)),
          (this.$jconfirmBoxContainer = this.$el.find(
            ".jconfirm-box-container"
          )),
          (this.$jconfirmBox = this.$body = this.$el.find(".jconfirm-box")),
          (this.$jconfirmBg = this.$el.find(".jconfirm-bg")),
          (this.$title = this.$el.find(".jconfirm-title")),
          (this.$titleContainer = this.$el.find(".jconfirm-title-c")),
          (this.$content = this.$el.find("div.jconfirm-content")),
          (this.$contentPane = this.$el.find(".jconfirm-content-pane")),
          (this.$icon = this.$el.find(".jconfirm-icon-c")),
          (this.$closeIcon = this.$el.find(".jconfirm-closeIcon")),
          (this.$holder = this.$el.find(".jconfirm-holder")),
          (this.$btnc = this.$el.find(".jconfirm-buttons")),
          (this.$scrollPane = this.$el.find(".jconfirm-scrollpane")),
          t.setStartingPoint(),
          (this._contentReady = r.Deferred()),
          (this._modalReady = r.Deferred()),
          this.$holder.css({
            "padding-top": this.offsetTop,
            "padding-bottom": this.offsetBottom,
          }),
          this.setTitle(),
          this.setIcon(),
          this._setButtons(),
          this._parseContent(),
          this.initDraggable(),
          this.isAjax && this.showLoading(!1),
          r
            .when(this._contentReady, this._modalReady)
            .then(function () {
              t.isAjaxLoading
                ? setTimeout(function () {
                    (t.isAjaxLoading = !1),
                      t.setContent(),
                      t.setTitle(),
                      t.setIcon(),
                      setTimeout(function () {
                        t.hideLoading(!1), t._updateContentMaxHeight();
                      }, 100),
                      "function" == typeof t.onContentReady &&
                        t.onContentReady();
                  }, 50)
                : (t._updateContentMaxHeight(),
                  t.setTitle(),
                  t.setIcon(),
                  "function" == typeof t.onContentReady && t.onContentReady()),
                t.autoClose && t._startCountDown();
            })
            .then(function () {
              t._watchContent();
            }),
          "none" === this.animation &&
            ((this.animationSpeed = 1), (this.animationBounce = 1)),
          this.$body.css(
            this._getCSS(this.animationSpeed, this.animationBounce)
          ),
          this.$contentPane.css(this._getCSS(this.animationSpeed, 1)),
          this.$jconfirmBg.css(this._getCSS(this.animationSpeed, 1)),
          this.$jconfirmBoxContainer.css(this._getCSS(this.animationSpeed, 1));
      },
      _typePrefix: "jconfirm-type-",
      typeParsed: "",
      _parseType: function (t) {
        this.typeParsed = this._typePrefix + t;
      },
      setType: function (t) {
        var n = this.typeParsed;
        this._parseType(t),
          this.$jconfirmBox.removeClass(n).addClass(this.typeParsed);
      },
      themeParsed: "",
      _themePrefix: "jconfirm-",
      setTheme: function (t) {
        var n = this.theme;
        (this.theme = t || this.theme),
          this._parseTheme(this.theme),
          n && this.$el.removeClass(n),
          this.$el.addClass(this.themeParsed),
          (this.theme = t);
      },
      _parseTheme: function (i) {
        var o = this;
        (i = i.split(",")),
          r.each(i, function (t, n) {
            -1 === n.indexOf(o._themePrefix) &&
              (i[t] = o._themePrefix + r.trim(n));
          }),
          (this.themeParsed = i.join(" ").toLowerCase());
      },
      backgroundDismissAnimationParsed: "",
      _bgDismissPrefix: "jconfirm-hilight-",
      _parseBgDismissAnimation: function (t) {
        var i = t.split(","),
          o = this;
        r.each(i, function (t, n) {
          -1 === n.indexOf(o._bgDismissPrefix) &&
            (i[t] = o._bgDismissPrefix + r.trim(n));
        }),
          (this.backgroundDismissAnimationParsed = i.join(" ").toLowerCase());
      },
      animationParsed: "",
      closeAnimationParsed: "",
      _animationPrefix: "jconfirm-animation-",
      setAnimation: function (t) {
        (this.animation = t || this.animation),
          this._parseAnimation(this.animation, "o");
      },
      _parseAnimation: function (t, n) {
        n = n || "o";
        var i = t.split(","),
          o = this;
        r.each(i, function (t, n) {
          -1 === n.indexOf(o._animationPrefix) &&
            (i[t] = o._animationPrefix + r.trim(n));
        });
        var e = i.join(" ").toLowerCase();
        return (
          "o" === n
            ? (this.animationParsed = e)
            : (this.closeAnimationParsed = e),
          e
        );
      },
      setCloseAnimation: function (t) {
        (this.closeAnimation = t || this.closeAnimation),
          this._parseAnimation(this.closeAnimation, "c");
      },
      setAnimationSpeed: function (t) {
        this.animationSpeed = t || this.animationSpeed;
      },
      columnClassParsed: "",
      setColumnClass: function (t) {
        this.useBootstrap
          ? ((this.columnClass = t || this.columnClass),
            this._parseColumnClass(this.columnClass),
            this.$jconfirmBoxContainer.addClass(this.columnClassParsed))
          : console.warn(
              "cannot set columnClass, useBootstrap is set to false"
            );
      },
      _updateContentMaxHeight: function () {
        var t =
          r(window).height() -
          (this.$jconfirmBox.outerHeight() - this.$contentPane.outerHeight()) -
          (this.offsetTop + this.offsetBottom);
        this.$contentPane.css({ "max-height": t + "px" });
      },
      setBoxWidth: function (t) {
        this.useBootstrap
          ? console.warn("cannot set boxWidth, useBootstrap is set to true")
          : ((this.boxWidth = t), this.$jconfirmBox.css("width", t));
      },
      _parseColumnClass: function (t) {
        var n;
        switch ((t = t.toLowerCase())) {
          case "xl":
          case "xlarge":
            n = "col-md-12";
            break;
          case "l":
          case "large":
            n = "col-md-8 col-md-offset-2";
            break;
          case "m":
          case "medium":
            n = "col-md-6 col-md-offset-3";
            break;
          case "s":
          case "small":
            n = "col-md-4 col-md-offset-4";
            break;
          case "xs":
          case "xsmall":
            n = "col-md-2 col-md-offset-5";
            break;
          default:
            n = t;
        }
        this.columnClassParsed = n;
      },
      initDraggable: function () {
        var n = this,
          i = this.$titleContainer;
        this.resetDrag(),
          this.draggable &&
            (i.on("mousedown", function (t) {
              i.addClass("jconfirm-hand"),
                (n.mouseX = t.clientX),
                (n.mouseY = t.clientY),
                (n.isDrag = !0);
            }),
            r(window).on("mousemove." + this._id, function (t) {
              n.isDrag &&
                ((n.movingX = t.clientX - n.mouseX + n.initialX),
                (n.movingY = t.clientY - n.mouseY + n.initialY),
                n.setDrag());
            }),
            r(window).on("mouseup." + this._id, function () {
              i.removeClass("jconfirm-hand"),
                n.isDrag &&
                  ((n.isDrag = !1),
                  (n.initialX = n.movingX),
                  (n.initialY = n.movingY));
            }));
      },
      resetDrag: function () {
        (this.isDrag = !1),
          (this.initialX = 0),
          (this.initialY = 0),
          (this.movingX = 0),
          (this.movingY = 0),
          (this.mouseX = 0),
          (this.mouseY = 0),
          this.$jconfirmBoxContainer.css("transform", "translate(0px, 0px)");
      },
      setDrag: function () {
        var t, n, i, o, e, s, a;
        this.draggable &&
          ((this.alignMiddle = !1),
          (t = this.$jconfirmBox.outerWidth()),
          (n = this.$jconfirmBox.outerHeight()),
          (i = r(window).width()),
          (o = r(window).height()),
          ((e = this).movingX % 1 != 0 && e.movingY % 1 != 0) ||
            (e.dragWindowBorder &&
              ((s = i / 2 - t / 2),
              (a = o / 2 - n / 2),
              (a -= e.dragWindowGap),
              (s -= e.dragWindowGap) + e.movingX < 0
                ? (e.movingX = -s)
                : s - e.movingX < 0 && (e.movingX = s),
              a + e.movingY < 0
                ? (e.movingY = -a)
                : a - e.movingY < 0 && (e.movingY = a)),
            e.$jconfirmBoxContainer.css(
              "transform",
              "translate(" + e.movingX + "px, " + e.movingY + "px)"
            )));
      },
      _scrollTop: function () {
        if ("undefined" != typeof pageYOffset) return pageYOffset;
        var t = document.body,
          n = document.documentElement;
        return (n = n.clientHeight ? n : t).scrollTop;
      },
      _watchContent: function () {
        var i = this;
        this._timer && clearInterval(this._timer);
        var o = 0;
        this._timer = setInterval(function () {
          var t, n;
          i.smoothContent &&
            ((t = i.$content.outerHeight() || 0) !== o && (o = t),
            (n = r(window).height()),
            i.offsetTop +
              i.offsetBottom +
              i.$jconfirmBox.height() -
              i.$contentPane.height() +
              i.$content.height() <
            n
              ? i.$contentPane.addClass("no-scroll")
              : i.$contentPane.removeClass("no-scroll"));
        }, this.watchInterval);
      },
      _overflowClass: "jconfirm-overflow",
      _hilightAnimating: !1,
      highlight: function () {
        this.hiLightModal();
      },
      hiLightModal: function () {
        var t,
          n = this;
        this._hilightAnimating ||
          (n.$body.addClass("hilight"),
          (t = parseFloat(n.$body.css("animation-duration")) || 2),
          (this._hilightAnimating = !0),
          setTimeout(function () {
            (n._hilightAnimating = !1), n.$body.removeClass("hilight");
          }, 1e3 * t));
      },
      _bindEvents: function () {
        var s = this;
        (this.boxClicked = !1),
          this.$scrollPane.click(function (t) {
            var n, i, o, e;
            s.boxClicked ||
              ((o = n = !1),
              (o =
                "string" ==
                  typeof (e =
                    "function" == typeof s.backgroundDismiss
                      ? s.backgroundDismiss()
                      : s.backgroundDismiss) && void 0 !== s.buttons[e]
                  ? ((n = e), !1)
                  : void 0 === e || !0 == !!e),
              n && (o = void 0 === (i = s.buttons[n].action.apply(s)) || !!i),
              o ? s.close() : s.hiLightModal()),
              (s.boxClicked = !1);
          }),
          this.$jconfirmBox.click(function (t) {
            s.boxClicked = !0;
          });
        var n = !1;
        r(window).on("jcKeyDown." + s._id, function (t) {
          n = n || !0;
        }),
          r(window).on("keyup." + s._id, function (t) {
            n && (s.reactOnKey(t), (n = !1));
          }),
          r(window).on("resize." + this._id, function () {
            s._updateContentMaxHeight(),
              setTimeout(function () {
                s.resetDrag();
              }, 100);
          });
      },
      _cubic_bezier: "0.36, 0.55, 0.19",
      _getCSS: function (t, n) {
        return {
          "-webkit-transition-duration": t / 1e3 + "s",
          "transition-duration": t / 1e3 + "s",
          "-webkit-transition-timing-function":
            "cubic-bezier(" + this._cubic_bezier + ", " + n + ")",
          "transition-timing-function":
            "cubic-bezier(" + this._cubic_bezier + ", " + n + ")",
        };
      },
      _setButtons: function () {
        var t,
          s = this,
          o = 0;
        "object" != typeof this.buttons && (this.buttons = {}),
          r.each(this.buttons, function (i, t) {
            (o += 1),
              "function" == typeof t && (s.buttons[i] = t = { action: t }),
              (s.buttons[i].text = t.text || i),
              (s.buttons[i].btnClass = t.btnClass || "btn-default"),
              (s.buttons[i].action = t.action || function () {}),
              (s.buttons[i].keys = t.keys || []),
              (s.buttons[i].isHidden = t.isHidden || !1),
              (s.buttons[i].isDisabled = t.isDisabled || !1),
              r.each(s.buttons[i].keys, function (t, n) {
                s.buttons[i].keys[t] = n.toLowerCase();
              });
            var n = r('<button type="button" class="btn"></button>')
              .html(s.buttons[i].text)
              .addClass(s.buttons[i].btnClass)
              .prop("disabled", s.buttons[i].isDisabled)
              .css("display", s.buttons[i].isHidden ? "none" : "")
              .click(function (t) {
                t.preventDefault();
                var n = s.buttons[i].action.apply(s, [s.buttons[i]]);
                s.onAction.apply(s, [i, s.buttons[i]]),
                  s._stopCountDown(),
                  (void 0 !== n && !n) || s.close();
              });
            (s.buttons[i].el = n),
              (s.buttons[i].setText = function (t) {
                n.html(t);
              }),
              (s.buttons[i].addClass = function (t) {
                n.addClass(t);
              }),
              (s.buttons[i].removeClass = function (t) {
                n.removeClass(t);
              }),
              (s.buttons[i].disable = function () {
                (s.buttons[i].isDisabled = !0), n.prop("disabled", !0);
              }),
              (s.buttons[i].enable = function () {
                (s.buttons[i].isDisabled = !1), n.prop("disabled", !1);
              }),
              (s.buttons[i].show = function () {
                (s.buttons[i].isHidden = !1), n.css("display", "");
              }),
              (s.buttons[i].hide = function () {
                (s.buttons[i].isHidden = !0), n.css("display", "none");
              }),
              (s["$_" + i] = s["$$" + i] = n),
              s.$btnc.append(n);
          }),
          0 === o && this.$btnc.hide(),
          null === this.closeIcon && 0 === o && (this.closeIcon = !0),
          this.closeIcon
            ? (this.closeIconClass &&
                ((t = '<i class="' + this.closeIconClass + '"></i>'),
                this.$closeIcon.html(t)),
              this.$closeIcon.click(function (t) {
                t.preventDefault();
                var n,
                  i = !1,
                  o = !1,
                  e =
                    "function" == typeof s.closeIcon
                      ? s.closeIcon()
                      : s.closeIcon;
                (o =
                  "string" == typeof e && void 0 !== s.buttons[e]
                    ? ((i = e), !1)
                    : void 0 === e || !0 == !!e),
                  i &&
                    (o = void 0 === (n = s.buttons[i].action.apply(s)) || !!n),
                  o && s.close();
              }),
              this.$closeIcon.show())
            : this.$closeIcon.hide();
      },
      setTitle: function (t, n) {
        var i;
        (n = n || !1),
          void 0 !== t &&
            ("string" == typeof t
              ? (this.title = t)
              : "function" == typeof t
              ? ("function" == typeof t.promise &&
                  console.error(
                    "Promise was returned from title function, this is not supported."
                  ),
                (i = t()),
                (this.title = "string" == typeof i && i))
              : (this.title = !1)),
          (this.isAjaxLoading && !n) ||
            (this.$title.html(this.title || ""), this.updateTitleContainer());
      },
      setIcon: function (t, n) {
        var i;
        (n = n || !1),
          void 0 !== t &&
            ("string" == typeof t
              ? (this.icon = t)
              : "function" == typeof t
              ? ((i = t()), (this.icon = "string" == typeof i && i))
              : (this.icon = !1)),
          (this.isAjaxLoading && !n) ||
            (this.$icon.html(
              this.icon ? '<i class="' + this.icon + '"></i>' : ""
            ),
            this.updateTitleContainer());
      },
      updateTitleContainer: function () {
        this.title || this.icon
          ? this.$titleContainer.show()
          : this.$titleContainer.hide();
      },
      setContentPrepend: function (t, n) {
        t && this.contentParsed.prepend(t);
      },
      setContentAppend: function (t) {
        t && this.contentParsed.append(t);
      },
      setContent: function (t, n) {
        n = !!n;
        var i = this;
        t && this.contentParsed.html("").append(t),
          (this.isAjaxLoading && !n) ||
            (this.$content.html(""),
            this.$content.append(this.contentParsed),
            setTimeout(function () {
              i.$body.find("input[autofocus]:visible:first").focus();
            }, 100));
      },
      loadingSpinner: !1,
      showLoading: function (t) {
        (this.loadingSpinner = !0),
          this.$jconfirmBox.addClass("loading"),
          t && this.$btnc.find("button").prop("disabled", !0);
      },
      hideLoading: function (t) {
        (this.loadingSpinner = !1),
          this.$jconfirmBox.removeClass("loading"),
          t && this.$btnc.find("button").prop("disabled", !1);
      },
      ajaxResponse: !1,
      contentParsed: "",
      isAjax: !1,
      isAjaxLoading: !1,
      _parseContent: function () {
        var t,
          n,
          o = this,
          i = "&nbsp;";
        "function" == typeof this.content &&
          ("string" == typeof (t = this.content.apply(this))
            ? (this.content = t)
            : ("object" == typeof t &&
                "function" == typeof t.always &&
                ((this.isAjax = !0),
                (this.isAjaxLoading = !0),
                t.always(function (t, n, i) {
                  (o.ajaxResponse = { data: t, status: n, xhr: i }),
                    o._contentReady.resolve(t, n, i),
                    "function" == typeof o.contentLoaded &&
                      o.contentLoaded(t, n, i);
                })),
              (this.content = i))),
          "string" == typeof this.content &&
            "url:" === this.content.substr(0, 4).toLowerCase() &&
            ((this.isAjax = !0),
            (this.isAjaxLoading = !0),
            (n = this.content.substring(4, this.content.length)),
            r
              .get(n)
              .done(function (t) {
                o.contentParsed.html(t);
              })
              .always(function (t, n, i) {
                (o.ajaxResponse = { data: t, status: n, xhr: i }),
                  o._contentReady.resolve(t, n, i),
                  "function" == typeof o.contentLoaded &&
                    o.contentLoaded(t, n, i);
              })),
          this.content || (this.content = i),
          this.isAjax ||
            (this.contentParsed.html(this.content),
            this.setContent(),
            o._contentReady.resolve());
      },
      _stopCountDown: function () {
        clearInterval(this.autoCloseInterval), this.$cd && this.$cd.remove();
      },
      _startCountDown: function () {
        var t = this,
          n = this.autoClose.split("|");
        if (2 !== n.length)
          return (
            console.error(
              "Invalid option for autoClose. example 'close|10000'"
            ),
            !1
          );
        var i = n[0],
          o = parseInt(n[1]);
        if (void 0 === this.buttons[i])
          return (
            console.error("Invalid button key '" + i + "' for autoClose"), !1
          );
        var e = Math.ceil(o / 1e3);
        (this.$cd = r('<span class="countdown"> (' + e + ")</span>").appendTo(
          this["$_" + i]
        )),
          (this.autoCloseInterval = setInterval(function () {
            t.$cd.html(" (" + --e + ") "),
              e <= 0 && (t["$$" + i].trigger("click"), t._stopCountDown());
          }, 1e3));
      },
      _getKey: function (t) {
        switch (t) {
          case 192:
            return "tilde";
          case 13:
            return "enter";
          case 16:
            return "shift";
          case 9:
            return "tab";
          case 20:
            return "capslock";
          case 17:
            return "ctrl";
          case 91:
            return "win";
          case 18:
            return "alt";
          case 27:
            return "esc";
          case 32:
            return "space";
        }
        var n = String.fromCharCode(t);
        return !!/^[A-z0-9]+$/.test(n) && n.toLowerCase();
      },
      reactOnKey: function (t) {
        var i = this,
          n = r(".jconfirm");
        if (n.eq(n.length - 1)[0] !== this.$el[0]) return !1;
        var o = t.which;
        if (this.$content.find(":input").is(":focus") && /13|32/.test(o))
          return !1;
        var e,
          s = this._getKey(o);
        "esc" === s &&
          this.escapeKey &&
          (!0 === this.escapeKey
            ? this.$scrollPane.trigger("click")
            : ("string" != typeof this.escapeKey &&
                "function" != typeof this.escapeKey) ||
              ((e =
                "function" == typeof this.escapeKey
                  ? this.escapeKey()
                  : this.escapeKey) &&
                (void 0 === this.buttons[e]
                  ? console.warn(
                      "Invalid escapeKey, no buttons found with key " + e
                    )
                  : this["$_" + e].trigger("click")))),
          r.each(this.buttons, function (t, n) {
            -1 !== n.keys.indexOf(s) && i["$_" + t].trigger("click");
          });
      },
      setDialogCenter: function () {
        console.info(
          "setDialogCenter is deprecated, dialogs are centered with CSS3 tables"
        );
      },
      _unwatchContent: function () {
        clearInterval(this._timer);
      },
      close: function (t) {
        var a = this;
        return (
          "function" == typeof this.onClose && this.onClose(t),
          this._unwatchContent(),
          r(window).unbind("resize." + this._id),
          r(window).unbind("keyup." + this._id),
          r(window).unbind("jcKeyDown." + this._id),
          this.draggable &&
            (r(window).unbind("mousemove." + this._id),
            r(window).unbind("mouseup." + this._id),
            this.$titleContainer.unbind("mousedown")),
          a.$el.removeClass(a.loadedClass),
          r("body").removeClass("jconfirm-no-scroll-" + a._id),
          a.$jconfirmBoxContainer.removeClass("jconfirm-no-transition"),
          setTimeout(function () {
            a.$body.addClass(a.closeAnimationParsed),
              a.$jconfirmBg.addClass("jconfirm-bg-h");
            var t = "none" === a.closeAnimation ? 1 : a.animationSpeed;
            setTimeout(function () {
              a.$el.remove();
              l.jconfirm.instances;
              for (
                var t, n, i, o, e, s = l.jconfirm.instances.length - 1;
                0 <= s;
                s--
              )
                l.jconfirm.instances[s]._id === a._id &&
                  l.jconfirm.instances.splice(s, 1);
              l.jconfirm.instances.length ||
                (a.scrollToPreviousElement &&
                  l.jconfirm.lastFocused &&
                  l.jconfirm.lastFocused.length &&
                  r.contains(document, l.jconfirm.lastFocused[0]) &&
                  ((t = l.jconfirm.lastFocused),
                  a.scrollToPreviousElementAnimate
                    ? ((n = r(window).scrollTop()),
                      (i = l.jconfirm.lastFocused.offset().top),
                      (o = r(window).height()),
                      n < i && i < n + o
                        ? t.focus()
                        : ((e = i - Math.round(o / 3)),
                          r("html, body").animate(
                            { scrollTop: e },
                            a.animationSpeed,
                            "swing",
                            function () {
                              t.focus();
                            }
                          )))
                    : t.focus(),
                  (l.jconfirm.lastFocused = !1))),
                "function" == typeof a.onDestroy && a.onDestroy();
            }, 0.4 * t);
          }, 50),
          !0
        );
      },
      open: function () {
        return (
          !this.isOpen() &&
          (this._buildHTML(), this._bindEvents(), this._open(), !0)
        );
      },
      setStartingPoint: function () {
        var t = !1;
        if (!0 !== this.animateFromElement && this.animateFromElement)
          (t = this.animateFromElement), (l.jconfirm.lastClicked = !1);
        else {
          if (!l.jconfirm.lastClicked || !0 !== this.animateFromElement)
            return !1;
          (t = l.jconfirm.lastClicked), (l.jconfirm.lastClicked = !1);
        }
        if (!t) return !1;
        var n = t.offset(),
          i = t.outerHeight() / 2,
          o = t.outerWidth() / 2;
        (i -= this.$jconfirmBox.outerHeight() / 2),
          (o -= this.$jconfirmBox.outerWidth() / 2);
        var e = n.top + i;
        e -= this._scrollTop();
        var s = n.left + o,
          a = r(window).height() / 2,
          c = r(window).width() / 2;
        if (
          ((e -= a - this.$jconfirmBox.outerHeight() / 2),
          (s -= c - this.$jconfirmBox.outerWidth() / 2),
          Math.abs(e) > a || Math.abs(s) > c)
        )
          return !1;
        this.$jconfirmBoxContainer.css(
          "transform",
          "translate(" + s + "px, " + e + "px)"
        );
      },
      _open: function () {
        var t = this;
        "function" == typeof t.onOpenBefore && t.onOpenBefore(),
          this.$body.removeClass(this.animationParsed),
          this.$jconfirmBg.removeClass("jconfirm-bg-h"),
          this.$body.focus(),
          t.$jconfirmBoxContainer.css("transform", "translate(0px, 0px)"),
          setTimeout(function () {
            t.$body.css(t._getCSS(t.animationSpeed, 1)),
              t.$body.css({
                "transition-property":
                  t.$body.css("transition-property") + ", margin",
              }),
              t.$jconfirmBoxContainer.addClass("jconfirm-no-transition"),
              t._modalReady.resolve(),
              "function" == typeof t.onOpen && t.onOpen(),
              t.$el.addClass(t.loadedClass);
          }, this.animationSpeed);
      },
      loadedClass: "jconfirm-open",
      isClosed: function () {
        return !this.$el || 0 === this.$el.parent().length;
      },
      isOpen: function () {
        return !this.isClosed();
      },
      toggle: function () {
        this.isOpen() ? this.close() : this.open();
      },
    }),
    (l.jconfirm.instances = []),
    (l.jconfirm.lastFocused = !1);
  var i = !(l.jconfirm.pluginDefaults = {
    template:
      '<div class="jconfirm"><div class="jconfirm-bg jconfirm-bg-h"></div><div class="jconfirm-scrollpane"><div class="jconfirm-row"><div class="jconfirm-cell"><div class="jconfirm-holder"><div class="jc-bs3-container"><div class="jc-bs3-row"><div class="jconfirm-box-container jconfirm-animated"><div class="jconfirm-box" role="dialog" aria-labelledby="labelled" tabindex="-1"><div class="jconfirm-closeIcon">&times;</div><div class="jconfirm-title-c"><span class="jconfirm-icon-c"></span><span class="jconfirm-title"></span></div><div class="jconfirm-content-pane"><div class="jconfirm-content"></div></div><div class="jconfirm-buttons"></div><div class="jconfirm-clear"></div></div></div></div></div></div></div></div></div></div>',
    title: "Hello",
    titleClass: "",
    type: "default",
    typeAnimated: !0,
    draggable: !0,
    dragWindowGap: 15,
    dragWindowBorder: !0,
    animateFromElement: !0,
    alignMiddle: !0,
    smoothContent: !0,
    content: "Are you sure to continue?",
    buttons: {},
    defaultButtons: {
      ok: { action: function () {} },
      close: { action: function () {} },
    },
    contentLoaded: function () {},
    icon: "",
    lazyOpen: !1,
    bgOpacity: null,
    theme: "light",
    animation: "scale",
    closeAnimation: "scale",
    animationSpeed: 400,
    animationBounce: 1,
    escapeKey: !0,
    rtl: !1,
    container: "body",
    containerFluid: !1,
    backgroundDismiss: !1,
    backgroundDismissAnimation: "shake",
    autoClose: !1,
    closeIcon: null,
    closeIconClass: !1,
    watchInterval: 100,
    columnClass:
      "col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1",
    boxWidth: "50%",
    scrollToPreviousElement: !0,
    scrollToPreviousElementAnimate: !0,
    useBootstrap: !0,
    offsetTop: 40,
    offsetBottom: 40,
    bootstrapClasses: {
      container: "container",
      containerFluid: "container-fluid",
      row: "row",
    },
    onContentReady: function () {},
    onOpenBefore: function () {},
    onOpen: function () {},
    onClose: function () {},
    onDestroy: function () {},
    onAction: function () {},
  });
  r(window).on("keydown", function (t) {
    var n;
    i ||
      ((n = !1),
      r(t.target).closest(".jconfirm-box").length && (n = !0),
      n && r(window).trigger("jcKeyDown"),
      (i = !0));
  }),
    r(window).on("keyup", function () {
      i = !1;
    }),
    (l.jconfirm.lastClicked = !1),
    r(document).on("mousedown", "button, a, [jc-source]", function () {
      l.jconfirm.lastClicked = r(this);
    });
});