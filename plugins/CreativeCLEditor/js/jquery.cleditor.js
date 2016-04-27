/*!
 CLEditor WYSIWYG HTML Editor v1.4.5
 http://premiumsoftware.net/CLEditor
 requires jQuery v1.4.2 or later
 Copyright 2010, Chris Landowski, Premium Software, LLC
 Dual licensed under the MIT or GPL Version 2 licenses.
*/
(function(n) {
    function vi(t) {
        var i = this,
            e = t.target,
            y = n.data(e, a),
            p = s[y],
            w = p.popupName,
            k = f[w],
            v, b;
        if (!i.disabled && n(e).attr(r) !== r) {
            if (v = {
                    editor: i,
                    button: e,
                    buttonName: y,
                    popup: k,
                    popupName: w,
                    command: p.command,
                    useCSS: i.options.useCSS
                }, p.buttonClick && p.buttonClick(t, v) === !1) return !1;
            if (y === "source") l(i) ? (delete i.range, i.$area.hide(), i.$frame.show(), e.title = p.title) : (i.$frame.hide(), i.$area.show(), e.title = "Show Rich Text");
            else if (!l(i)) {
                if (w) {
                    if (b = n(k), w === "url") {
                        if (y === "link" && ri(i) === "") return ut(i, "A selection is required when inserting a link.", e), !1;
                        b.children(":button").unbind(u).bind(u, function() {
                            var t = b.find(":text"),
                                r = n.trim(t.val());
                            r !== "" && h(i, v.command, r, null, v.button);
                            t.val("http://");
                            o();
                            c(i)
                        })
                    } else w === "pastetext" && b.children(":button").unbind(u).bind(u, function() {
                        var n = b.find("textarea"),
                            t = n.val().replace(/\n/g, "<br />");
                        t !== "" && h(i, v.command, t, null, v.button);
                        n.val("");
                        o();
                        c(i)
                    });
                    return e !== n.data(k, d) ? (ui(i, k, e), !1) : void 0
                }
                if (y === "print") i.$frame[0].contentWindow.print();
                else if (!h(i, v.command, v.value, v.useCSS, e)) return !1
            }
            c(i)
        }
    }

    function kt(t) {
        var i = n(t.target).closest("div");
        i.css(et, i.data(a) ? "#FFF" : "#FFC")
    }

    function dt(t) {
        n(t.target).closest("div").css(et, "transparent")
    }

    function yi(i) {
        var v = this,
            y = i.data.popup,
            r = i.target,
            l;
        if (y !== f.msg && !n(y).hasClass(tt)) {
            var w = n.data(y, d),
                u = n.data(w, a),
                p = s[u],
                b = p.command,
                e, k = v.options.useCSS;
            if (u === "font" ? e = r.style.fontFamily.replace(/"/g, "") : u === "size" ? (r.tagName.toUpperCase() === "DIV" && (r = r.children[0]), e = r.innerHTML) : u === "style" ? e = "<" + r.tagName + ">" : u === "color" ? e = ti(r.style.backgroundColor) : u === "highlight" && (e = ti(r.style.backgroundColor), t ? b = "backcolor" : k = !0), l = {
                    editor: v,
                    button: w,
                    buttonName: u,
                    popup: y,
                    popupName: p.popupName,
                    command: b,
                    value: e,
                    useCSS: k
                }, !p.popupClick || p.popupClick(i, l) !== !1) {
                if (l.command && !h(v, l.command, l.value, l.useCSS, w)) return !1;
                o();
                c(v)
            }
        }
    }

    function it(n) {
        for (var t = 1, i = 0, r = 0; r < n.length; ++r) t = (t + n.charCodeAt(r)) % 65521, i = (i + t) % 65521;
        return i << 16 | t
    }

    function pi(n) {
        n.$area.val("");
        ft(n)
    }

    function gt(r, u, e, o, s) {
        var h, c;
        return f[r] ? f[r] : (h = n(i).hide().addClass(si).appendTo("body"), o ? h.html(o) : r === "color" ? (c = u.colors.split(" "), c.length < 10 && h.width("auto"), n.each(c, function(t, r) {
            n(i).appendTo(h).css(et, "#" + r)
        }), e = hi) : r === "font" ? n.each(u.fonts.split(","), function(t, r) {
            n(i).appendTo(h).css("fontFamily", r).html(r)
        }) : r === "size" ? n.each(u.sizes.split(","), function(t, r) {
            n(i).appendTo(h).html('<font size="' + r + '">' + r + "<\/font>")
        }) : r === "style" ? n.each(u.styles, function(t, r) {
            n(i).appendTo(h).html(r[1] + r[0] + r[1].replace("<", "<\/"))
        }) : r === "url" ? (h.html('<label>Enter URL:<br /><input type="text" value="http://" style="width:200px" /><\/label><br /><input type="button" value="Submit" />'), e = tt) : r === "pastetext" && (h.html('<label>Paste your content here:<br /><textarea rows="3" style="width:200px"><\/textarea><\/label><br /><input type="button" value="Submit" />'), e = tt), e || o || (e = pt), h.addClass(e), t && h.attr(ot, "on").find("div,font,p,h1,h2,h3,h4,h5,h6").attr(ot, "on"), (h.hasClass(pt) || s === !0) && h.children().hover(kt, dt), f[r] = h[0], h[0])
    }

    function ni(n, i) {
        i ? (n.$area.attr(r, r), n.disabled = !0) : (n.$area.removeAttr(r), delete n.disabled);
        try {
            t ? n.doc.body.contentEditable = !i : n.doc.designMode = i ? "off" : "on"
        } catch (u) {}
        b(n)
    }

    function h(n, i, r, u, f) {
        var c, h, o, s, l;
        if (rt(n), t || ((u === undefined || u === null) && (u = n.options.useCSS), n.doc.execCommand("styleWithCSS", 0, u.toString())), c = i.toLowerCase() === "inserthtml", t && c) w(n).pasteHTML(r);
        else if (y && c) h = e(n), o = h.getRangeAt(0), o.deleteContents(), o.insertNode(o.createContextualFragment(r)), h.removeAllRanges(), h.addRange(o);
        else {
            s = !0;
            try {
                s = n.doc.execCommand(i, 0, r || null)
            } catch (a) {
                l = a.message;
                s = !1
            }
            s || ("cutcopypaste".indexOf(i) > -1 ? ut(n, "For security reasons, your browser does not support the " + i + " command. Try using the keyboard shortcut or context menu instead.", f) : ut(n, l ? l : "Error executing the " + i + " command.", f))
        }
        return b(n), ct(n, !0), s
    }

    function c(n) {
        setTimeout(function() {
            l(n) ? n.$area.focus() : n.$frame[0].contentWindow.focus();
            b(n)
        }, 0)
    }

    function w(n) {
        return t ? e(n).createRange() : e(n).getRangeAt(0)
    }

    function e(n) {
        return t ? n.doc.selection : n.$frame[0].contentWindow.getSelection()
    }

    function ti(n) {
        var i = /rgba?\((\d+), (\d+), (\d+)/.exec(n),
            t;
        if (i) {
            for (n = (i[1] << 16 | i[2] << 8 | i[3]).toString(16); n.length < 6;) n = "0" + n;
            return "#" + n
        }
        return (t = n.split(""), n.length === 4) ? "#" + t[1] + t[1] + t[2] + t[2] + t[3] + t[3] : n
    }

    function o() {
        n.each(f, function(t, i) {
            n(i).hide().unbind(u).removeData(d)
        })
    }

    function ii() {
        var t = n("link[href*=cleditor]").attr("href");
        return t.replace(/^(.*\/)[^\/]+$/, "$1") + "images/"
    }

    function wi(n) {
        return "url(" + ii() + n + ")"
    }

    function ht(i) {
        var s = i.$main,
            r = i.options;
        i.$frame && i.$frame.remove();
        var u = i.$frame = n('<iframe frameborder="0" src="javascript:true;" />').hide().appendTo(s),
            l = u[0].contentWindow,
            f = i.doc = l.document,
            h = n(f);
        f.open();
        f.write(r.docType + "<html>" + (r.docCSSFile === "" ? "" : '<head><link rel="stylesheet" type="text/css" href="' + r.docCSSFile + '" /><\/head>') + '<body id="new_editor" style="' + r.bodyStyle + '"><\/body><\/html>');
        f.close();
        (t || y) && h.click(function() {
            c(i)
        });
        ft(i);
        t || y ? (h.bind("beforedeactivate beforeactivate selectionchange keypress keyup", function(n) {
            if (n.type === "beforedeactivate") i.inactive = !0;
            else if (n.type === "beforeactivate") !i.inactive && i.range && i.range.length > 1 && i.range.shift(), delete i.inactive;
            else if (!i.inactive)
                for (i.range || (i.range = []), i.range.unshift(w(i)); i.range.length > 2;) i.range.pop()
        }), u.focus(function() {
            rt(i);
            n(i).triggerHandler(nt)
        }), u.blur(function() {
            n(i).triggerHandler(k)
        })) : n(u[0].contentWindow).focus(function() {
            n(i).triggerHandler(nt)
        }).blur(function() {
            n(i).triggerHandler(k)
        });
        h.click(o).keydown(function(n) {
            t && e(i).type == "Control" && n.keyCode == 8 && (e(i).clear(), n.preventDefault())
        }).bind("keyup mouseup", function() {
            b(i);
            ct(i, !0)
        });
        st ? i.$area.show() : u.show();
        n(function() {
            var t = i.$toolbar,
                f = t.children("div:last"),
                e = s.width(),
                n = f.offset().top + f.outerHeight() - t.offset().top + 1;
            t.height(n);
            n = (/%/.test("" + r.height) ? s.height() : parseInt(r.height, 10)) - n;
            u.width(e).height(n);
            i.$area.width(e).height(li ? n - 2 : n);
            ni(i, i.disabled);
            b(i)
        })
    }

    function b(i) {
        var u, e;
        st || !ai || i.focused || (i.$frame[0].contentWindow.focus(), window.focus(), i.focused = !0);
        u = i.doc;
        t && (u = w(i));
        e = l(i);
        n.each(i.$toolbar.find("." + vt), function(o, s) {
            var v = n(s),
                h = n.cleditor.buttons[n.data(s, a)],
                c = h.command,
                l = !0,
                p;
            if (i.disabled) l = !1;
            else if (h.getEnabled) p = {
                editor: i,
                button: s,
                buttonName: h.name,
                popup: f[h.popupName],
                popupName: h.popupName,
                command: h.command,
                useCSS: i.options.useCSS
            }, l = h.getEnabled(p), l === undefined && (l = !0);
            else if ((e || st) && h.name !== "source" || t && (c === "undo" || c === "redo")) l = !1;
            else if (c && c !== "print" && (t && c === "hilitecolor" && (c = "backcolor"), !t && !y || c !== "inserthtml")) try {
                l = u.queryCommandEnabled(c)
            } catch (w) {
                l = !1
            }
            l ? (v.removeClass(yt), v.removeAttr(r)) : (v.addClass(yt), v.attr(r, r))
        })
    }

    function rt(n) {
        n.range && (t ? n.range[0].select() : y && e(n).addRange(n.range[0]))
    }

    function bi(n) {
        setTimeout(function() {
            l(n) ? n.$area.select() : h(n, "selectall")
        }, 0)
    }

    function ki(i) {
        var u, r, f;
        return (rt(i), u = w(i), t) ? u.htmlText : (r = n("<layer>")[0], r.appendChild(u.cloneContents()), f = r.innerHTML, r = null, f)
    }

    function ri(n) {
        return (rt(n), t) ? w(n).text : e(n).toString()
    }

    function ut(n, t, i) {
        var r = gt("msg", n.options, ci);
        r.innerHTML = t;
        ui(n, r, i)
    }

    function ui(t, i, r) {
        var f, h, c, e = n(i),
            l, s;
        r ? (l = n(r), f = l.offset(), h = --f.left, c = f.top + l.height()) : (s = t.$toolbar, f = s.offset(), h = Math.floor((s.width() - e.width()) / 2) + f.left, c = f.top + s.height() - 2);
        o();
        e.css({
            left: h,
            top: c
        }).show();
        r && (n.data(i, d, r), e.bind(u, {
            popup: i
        }, n.proxy(yi, t)));
        setTimeout(function() {
            e.find(":text,textarea").eq(0).focus().select()
        }, 100)
    }

    function l(n) {
        return n.$area.is(":visible")
    }

    function ft(t, i) {
        var u = t.$area.val(),
            o = t.options,
            f = o.updateFrame,
            s = n(t.doc.body),
            e, r;
        if (f) {
            if (e = it(u), i && t.areaChecksum === e) return;
            t.areaChecksum = e
        }
        r = f ? f(u) : u;
        r = r.replace(/<(?=\/?script)/ig, "&lt;");
        o.updateTextArea && (t.frameChecksum = it(r));
        r !== s.html() && (s.html(r), n(t).triggerHandler(g))
    }

    function ct(t, i) {
        var u = n(t.doc.body).html(),
            o = t.options,
            f = o.updateTextArea,
            s = t.$area,
            e, r;
        if (f) {
            if (e = it(u), i && t.frameChecksum === e) return;
            t.frameChecksum = e
        }
        r = f ? f(u) : u;
        o.updateFrame && (t.areaChecksum = it(r));
        r !== s.val() && (s.val(r), n(t).triggerHandler(g))
    }
    var p, bt;
    n.cleditor = {
        defaultOptions: {
            width: "auto",
            height: 250,
            controls: "bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | undo redo | rule image link unlink | cut copy paste pastetext | print source",
            colors: "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C 999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C 666 900 C60 C93 990 090 399 33F 60C 939 333 600 930 963 660 060 366 009 339 636 000 300 630 633 330 030 033 006 309 303",
            fonts: "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond,Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
            sizes: "1,2,3,4,5,6,7",
            styles: [
                ["Paragraph", "<p>"],
                ["Header 1", "<h1>"],
                ["Header 2", "<h2>"],
                ["Header 3", "<h3>"],
                ["Header 4", "<h4>"],
                ["Header 5", "<h5>"],
                ["Header 6", "<h6>"]
            ],
            useCSS: !0,
            docType: '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
            docCSSFile: "",
            bodyStyle: "margin:4px; font:10pt Arial,Verdana; cursor:text"
        },
        buttons: {
            init: "bold,,|italic,,|underline,,|strikethrough,,|subscript,,|superscript,,|font,,fontname,|size,Font Size,fontsize,|style,,formatblock,|color,Font Color,forecolor,|highlight,Text Highlight Color,hilitecolor,color|removeformat,Remove Formatting,|bullets,,insertunorderedlist|numbering,,insertorderedlist|outdent,,|indent,,|alignleft,Align Text Left,justifyleft|center,,justifycenter|alignright,Align Text Right,justifyright|justify,,justifyfull|undo,,|redo,,|rule,Insert Horizontal Rule,inserthorizontalrule|image,Insert Image,insertimage,url|link,Insert Hyperlink,createlink,url|unlink,Remove Hyperlink,|cut,,|copy,,|paste,,|pastetext,Paste as Text,inserthtml,|print,,|source,Show Source"
        },
        imagesPath: function() {
            return ii()
        }
    };
    n.fn.cleditor = function(t) {
        var i = n([]);
        return this.each(function(r, u) {
            if (u.tagName.toUpperCase() === "TEXTAREA") {
                var f = n.data(u, lt);
                f || (f = new cleditor(u, t));
                i = i.add(f)
            }
        }), i
    };
    var et = "backgroundColor",
        k = "blurred",
        d = "button",
        a = "buttonName",
        g = "change",
        lt = "cleditor",
        u = "click",
        r = "disabled",
        i = "<div>",
        nt = "focused",
        ot = "unselectable",
        fi = "cleditorMain",
        ei = "cleditorToolbar",
        at = "cleditorGroup",
        vt = "cleditorButton",
        yt = "cleditorDisabled",
        oi = "cleditorDivider",
        si = "cleditorPopup",
        pt = "cleditorList",
        hi = "cleditorColor",
        tt = "cleditorPrompt",
        ci = "cleditorMsg",
        v = navigator.userAgent.toLowerCase(),
        t = /msie/.test(v),
        li = /msie\s6/.test(v),
        y = /(trident)(?:.*rv:([\w.]+))?/.test(v),
        ai = /webkit/.test(v),
        st = /iPhone|iPad|iPod/i.test(v),
        f = {},
        wt, s = n.cleditor.buttons;
    n.each(s.init.split("|"), function(n, t) {
        var i = t.split(","),
            r = i[0];
        s[r] = {
            stripIndex: n,
            name: r,
            title: i[1] === "" ? r.charAt(0).toUpperCase() + r.substr(1) : i[1],
            command: i[2] === "" ? r : i[2],
            popupName: i[3] === "" ? r : i[3]
        }
    });
    delete s.init;
    cleditor = function(r, f) {
        var e = this;
        e.options = f = n.extend({}, n.cleditor.defaultOptions, f);
        var l = e.$area = n(r).css({
                border: "none",
                margin: 0,
                padding: 0
            }).hide().data(lt, e).blur(function() {
                ft(e, !0)
            }),
            v = e.$main = n(i).addClass(fi).width(f.width).height(f.height),
            y = e.$toolbar = n(i).addClass(ei).appendTo(v),
            h = n(i).addClass(at).appendTo(y),
            c = 0;
        n.each(f.controls.split(" "), function(r, o) {
            var w, l, p, v;
            if (o === "") return !0;
            o === "|" ? (w = n(i).addClass(oi).appendTo(h), h.width(c + 1), c = 0, h = n(i).addClass(at).appendTo(y)) : (l = s[o], p = n(i).data(a, l.name).addClass(vt).attr("title", l.title).bind(u, n.proxy(vi, e)).appendTo(h).hover(kt, dt), c += 24, h.width(c + 1), v = {}, l.css ? v = l.css : l.image && (v.backgroundImage = wi(l.image)), l.stripIndex && (v.backgroundPosition = l.stripIndex * -24), p.css(v), t && p.attr(ot, "on"), l.popupName && gt(l.popupName, f, l.popupClass, l.popupContent, l.popupHover))
        });
        v.insertBefore(l).append(l);
        wt || (n(document).click(function(t) {
            var i = n(t.target);
            i.add(i.parents()).is("." + tt) || o()
        }), wt = !0);
        /auto|%/.test("" + f.width + f.height) && n(window).bind("resize.cleditor", function() {
            ht(e)
        });
        ht(e)
    };
    p = cleditor.prototype;
    bt = [
        ["clear", pi],
        ["disable", ni],
        ["execCommand", h],
        ["focus", c],
        ["hidePopups", o],
        ["sourceMode", l, !0],
        ["refresh", ht],
        ["select", bi],
        ["selectedHTML", ki, !0],
        ["selectedText", ri, !0],
        ["showMessage", ut],
        ["updateFrame", ft],
        ["updateTextArea", ct]
    ];
    n.each(bt, function(n, t) {
        p[t[0]] = function() {
            for (var u, n = this, r = [n], i = 0; i < arguments.length; i++) r.push(arguments[i]);
            return (u = t[1].apply(n, r), t[2]) ? u : n
        }
    });
    p.blurred = function(t) {
        var i = n(this);
        return t ? i.bind(k, t) : i.trigger(k)
    };
    p.change = function(t) {
        var i = n(this);
        return t ? i.bind(g, t) : i.trigger(g)
    };
    p.focused = function(t) {
        var i = n(this);
        return t ? i.bind(nt, t) : i.trigger(nt)
    }
})(jQuery);
/*
//# sourceMappingURL=jquery.cleditor.min.js.map
*/