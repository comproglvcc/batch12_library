﻿
if (!this.JSON) {
    this.JSON = {};
}
(function() {
    "use strict";
    function f(n) {
        return n < 10 ? '0' + n : n;
    }
    if (typeof Date.prototype.toJSON !== 'function') {
        Date.prototype.toJSON = function(key) {
            return isFinite(this.valueOf()) ?
this.getUTCFullYear() + '-' +
f(this.getUTCMonth() + 1) + '-' +
f(this.getUTCDate()) + 'T' +
f(this.getUTCHours()) + ':' +
f(this.getUTCMinutes()) + ':' +
f(this.getUTCSeconds()) + 'Z' : null;
        };
        String.prototype.toJSON =
Number.prototype.toJSON =
Boolean.prototype.toJSON = function(key) {
    return this.valueOf();
};
    }
    var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
gap,
indent,
meta = {
    '\b': '\\b',
    '\t': '\\t',
    '\n': '\\n',
    '\f': '\\f',
    '\r': '\\r',
    '"': '\\"',
    '\\': '\\\\'
},
rep;
    function quote(string) {
        escapable.lastIndex = 0;
        return escapable.test(string) ?
'"' + string.replace(escapable, function(a) {
    var c = meta[a];
    return typeof c === 'string' ? c :
'\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
}) + '"' :
'"' + string + '"';
    }
    function str(key, holder) {
        var i,
k,
v,
length,
mind = gap,
partial,
value = holder[key];
        if (value && typeof value === 'object' &&
typeof value.toJSON === 'function') {
            value = value.toJSON(key);
        }
        if (typeof rep === 'function') {
            value = rep.call(holder, key, value);
        }
        switch (typeof value) {
            case 'string':
                return quote(value);
            case 'number':
                return isFinite(value) ? String(value) : 'null';
            case 'boolean':
            case 'null':
                return String(value);
            case 'object':
                if (!value) {
                    return 'null';
                }
                gap += indent;
                partial = [];
                if (Object.prototype.toString.apply(value) === '[object Array]') {
                    length = value.length;
                    for (i = 0; i < length; i += 1) {
                        partial[i] = str(i, value) || 'null';
                    }
                    v = partial.length === 0 ? '[]' :
gap ? '[\n' + gap +
partial.join(',\n' + gap) + '\n' +
mind + ']' :
'[' + partial.join(',') + ']';
                    gap = mind;
                    return v;
                }
                if (rep && typeof rep === 'object') {
                    length = rep.length;
                    for (i = 0; i < length; i += 1) {
                        k = rep[i];
                        if (typeof k === 'string') {
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                } else {
                    for (k in value) {
                        if (Object.hasOwnProperty.call(value, k)) {
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                }
                v = partial.length === 0 ? '{}' :
gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' +
mind + '}' : '{' + partial.join(',') + '}';
                gap = mind;
                return v;
        }
    }
    if (typeof JSON.stringify !== 'function') {
        JSON.stringify = function(value, replacer, space) {
            var i;
            gap = '';
            indent = '';
            if (typeof space === 'number') {
                for (i = 0; i < space; i += 1) {
                    indent += ' ';
                }
            } else if (typeof space === 'string') {
                indent = space;
            }
            rep = replacer;
            if (replacer && typeof replacer !== 'function' &&
(typeof replacer !== 'object' ||
typeof replacer.length !== 'number')) {
                throw new Error('JSON.stringify');
            }
            return str('', { '': value });
        };
    }
    if (typeof JSON.parse !== 'function') {
        JSON.parse = function(text, reviver) {
            var j;
            function walk(holder, key) {
                var k, v, value = holder[key];
                if (value && typeof value === 'object') {
                    for (k in value) {
                        if (Object.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }
            text = String(text);
            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function(a) {
                    return '\\u' +
('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                });
            }
            if (/^[\],:{}\s]*$/
.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@')
.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']')
.replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                j = eval('(' + text + ')');
                return typeof reviver === 'function' ?
walk({ '': j }, '') : j;
            }
            throw new SyntaxError('JSON.parse');
        };
    }
} ());
var hexcase = 0;
var b64pad = "";
var chrsz = 8;
function obs(s) {
    return b2h(cmc5(s2b(s), s.length * chrsz))
}
function b64_md5(s) {
    return binl2b64(cmc5(s2b(s), s.length * chrsz))
}
function str_md5(s) {
    return binl2str(cmc5(s2b(s), s.length * chrsz))
}
function hex_hmac_md5(a, b) {
    return b2h(core_hmac_md5(a, b))
}
function b64_hmac_md5(a, b) {
    return binl2b64(core_hmac_md5(a, b))
}
function str_hmac_md5(a, b) {
    return binl2str(core_hmac_md5(a, b))
}
function cmc5(x, e) {
    x[e >> 5] |= 0x80 << ((e) % 32);
    x[(((e + 64) >>> 9) << 4) + 14] = e;
    var a = 1732584193;
    var b = -271733879;
    var c = -1732584194;
    var d = 271733878;
    for (var i = 0; i < x.length; i += 16) {
        var f = a;
        var g = b;
        var h = c;
        var j = d;
        a = md5_ff(a, b, c, d, x[i + 0], 7, -680876936);
        d = md5_ff(d, a, b, c, x[i + 1], 12, -389564586);
        c = md5_ff(c, d, a, b, x[i + 2], 17, 606105819);
        b = md5_ff(b, c, d, a, x[i + 3], 22, -1044525330);
        a = md5_ff(a, b, c, d, x[i + 4], 7, -176418897);
        d = md5_ff(d, a, b, c, x[i + 5], 12, 1200080426);
        c = md5_ff(c, d, a, b, x[i + 6], 17, -1473231341);
        b = md5_ff(b, c, d, a, x[i + 7], 22, -45705983);
        a = md5_ff(a, b, c, d, x[i + 8], 7, 1770035416);
        d = md5_ff(d, a, b, c, x[i + 9], 12, -1958414417);
        c = md5_ff(c, d, a, b, x[i + 10], 17, -42063);
        b = md5_ff(b, c, d, a, x[i + 11], 22, -1990404162);
        a = md5_ff(a, b, c, d, x[i + 12], 7, 1804603682);
        d = md5_ff(d, a, b, c, x[i + 13], 12, -40341101);
        c = md5_ff(c, d, a, b, x[i + 14], 17, -1502002290);
        b = md5_ff(b, c, d, a, x[i + 15], 22, 1236535329);
        a = md5_gg(a, b, c, d, x[i + 1], 5, -165796510);
        d = md5_gg(d, a, b, c, x[i + 6], 9, -1069501632);
        c = md5_gg(c, d, a, b, x[i + 11], 14, 643717713);
        b = md5_gg(b, c, d, a, x[i + 0], 20, -373897302);
        a = md5_gg(a, b, c, d, x[i + 5], 5, -701558691);
        d = md5_gg(d, a, b, c, x[i + 10], 9, 38016083);
        c = md5_gg(c, d, a, b, x[i + 15], 14, -660478335);
        b = md5_gg(b, c, d, a, x[i + 4], 20, -405537848);
        a = md5_gg(a, b, c, d, x[i + 9], 5, 568446438);
        d = md5_gg(d, a, b, c, x[i + 14], 9, -1019803690);
        c = md5_gg(c, d, a, b, x[i + 3], 14, -187363961);
        b = md5_gg(b, c, d, a, x[i + 8], 20, 1163531501);
        a = md5_gg(a, b, c, d, x[i + 13], 5, -1444681467);
        d = md5_gg(d, a, b, c, x[i + 2], 9, -51403784);
        c = md5_gg(c, d, a, b, x[i + 7], 14, 1735328473);
        b = md5_gg(b, c, d, a, x[i + 12], 20, -1926607734);
        a = md5_hh(a, b, c, d, x[i + 5], 4, -378558);
        d = md5_hh(d, a, b, c, x[i + 8], 11, -2022574463);
        c = md5_hh(c, d, a, b, x[i + 11], 16, 1839030562);
        b = md5_hh(b, c, d, a, x[i + 14], 23, -35309556);
        a = md5_hh(a, b, c, d, x[i + 1], 4, -1530992060);
        d = md5_hh(d, a, b, c, x[i + 4], 11, 1272893353);
        c = md5_hh(c, d, a, b, x[i + 7], 16, -155497632);
        b = md5_hh(b, c, d, a, x[i + 10], 23, -1094730640);
        a = md5_hh(a, b, c, d, x[i + 13], 4, 681279174);
        d = md5_hh(d, a, b, c, x[i + 0], 11, -358537222);
        c = md5_hh(c, d, a, b, x[i + 3], 16, -722521979);
        b = md5_hh(b, c, d, a, x[i + 6], 23, 76029189);
        a = md5_hh(a, b, c, d, x[i + 9], 4, -640364487);
        d = md5_hh(d, a, b, c, x[i + 12], 11, -421815835);
        c = md5_hh(c, d, a, b, x[i + 15], 16, 530742520);
        b = md5_hh(b, c, d, a, x[i + 2], 23, -995338651);
        a = md5_ii(a, b, c, d, x[i + 0], 6, -198630844);
        d = md5_ii(d, a, b, c, x[i + 7], 10, 1126891415);
        c = md5_ii(c, d, a, b, x[i + 14], 15, -1416354905);
        b = md5_ii(b, c, d, a, x[i + 5], 21, -57434055);
        a = md5_ii(a, b, c, d, x[i + 12], 6, 1700485571);
        d = md5_ii(d, a, b, c, x[i + 3], 10, -1894986606);
        c = md5_ii(c, d, a, b, x[i + 10], 15, -1051523);
        b = md5_ii(b, c, d, a, x[i + 1], 21, -2054922799);
        a = md5_ii(a, b, c, d, x[i + 8], 6, 1873313359);
        d = md5_ii(d, a, b, c, x[i + 15], 10, -30611744);
        c = md5_ii(c, d, a, b, x[i + 6], 15, -1560198380);
        b = md5_ii(b, c, d, a, x[i + 13], 21, 1309151649);
        a = md5_ii(a, b, c, d, x[i + 4], 6, -145523070);
        d = md5_ii(d, a, b, c, x[i + 11], 10, -1120210379);
        c = md5_ii(c, d, a, b, x[i + 2], 15, 718787259);
        b = md5_ii(b, c, d, a, x[i + 9], 21, -343485551);
        a = safe_add(a, f);
        b = safe_add(b, g);
        c = safe_add(c, h);
        d = safe_add(d, j)
    }
    return Array(a, b, c, d)
}
function md5_cmn(q, a, b, x, s, t) {
    return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s), b)
}
function md5_ff(a, b, c, d, x, s, t) {
    return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t)
}
function md5_gg(a, b, c, d, x, s, t) {
    return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t)
}
function md5_hh(a, b, c, d, x, s, t) {
    return md5_cmn(b ^ c ^ d, a, b, x, s, t)
}
function md5_ii(a, b, c, d, x, s, t) {
    return md5_cmn(c ^ (b | (~d)), a, b, x, s, t)
}
function core_hmac_md5(a, b) {
    var c = s2b(a);
    if (c.length > 16) c = cmc5(c, a.length * chrsz);
    var d = Array(16),
opad = Array(16);
    for (var i = 0; i < 16; i++) {
        d[i] = c[i] ^ 0x36363636;
        opad[i] = c[i] ^ 0x5C5C5C5C
    }
    var e = cmc5(d.concat(s2b(b)), 512 + b.length * chrsz);
    return cmc5(opad.concat(e), 512 + 128)
}
function safe_add(x, y) {
    var a = (x & 0xFFFF) + (y & 0xFFFF);
    var b = (x >> 16) + (y >> 16) + (a >> 16);
    return (b << 16) | (a & 0xFFFF)
}
function bit_rol(a, b) {
    return (a << b) | (a >>> (32 - b))
}
function s2b(a) {
    var b = Array();
    var c = (1 << chrsz) - 1;
    for (var i = 0; i < a.length * chrsz; i += chrsz) b[i >> 5] |= (a.charCodeAt(i / chrsz) & c) << (i % 32);
    return b
}
function binl2str(a) {
    var b = "";
    var c = (1 << chrsz) - 1;
    for (var i = 0; i < a.length * 32; i += chrsz) b += String.fromCharCode((a[i >> 5] >>> (i % 32)) & c);
    return b
}
function b2h(a) {
    var b = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
    var c = "";
    for (var i = 0; i < a.length * 4; i++) {
        c += b.charAt((a[i >> 2] >> ((i % 4) * 8 + 4)) & 0xF) + b.charAt((a[i >> 2] >> ((i % 4) * 8)) & 0xF)
    }
    return c
}
function binl2b64(a) {
    var b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
    var c = "";
    for (var i = 0; i < a.length * 4; i += 3) {
        var d = (((a[i >> 2] >> 8 * (i % 4)) & 0xFF) << 16) | (((a[i + 1 >> 2] >> 8 * ((i + 1) % 4)) & 0xFF) << 8) | ((a[i + 2 >> 2] >> 8 * ((i + 2) % 4)) & 0xFF);
        for (var j = 0; j < 4; j++) {
            if (i * 8 + j * 6 > a.length * 32) c += b64pad;
            else c += b.charAt((d >> 6 * (3 - j)) & 0x3F)
        }
    }
    return c
}
try {
    var SEP = '|';
    ua = window.navigator.userAgent.toLowerCase();
    opera = ua.indexOf("opera") >= 0;
    ie = ua.indexOf("msie") >= 0 && !opera;
    iemac = ie && ua.indexOf("mac") >= 0;
    moz = ua.indexOf("mozilla") && !ie && !opera;
    os = window.navigator.platform;
} catch (e) {
}
function activeXDetect(componentClassID) {
    componentVersion = document.body.getComponentVersion('{' + componentClassID + '}', 'ComponentID');
    return (componentVersion != null) ? componentVersion : false;
}
function extractVersions(s) {
    extractedVersions = "";
    for (var i = 0; i < s.length; i++) {
        charAtValue = s.charAt(i);
        if ((charAtValue >= '0' && charAtValue <= '9')
|| charAtValue == '.'
|| charAtValue == '_'
|| charAtValue == ','
) {
            extractedVersions += charAtValue;
        }
    }
    return extractedVersions;
}
function stripIllegalChars(value) {
    t = "";
    value = value.toLowerCase();
    for (i = 0; i < value.length; i++) {
        if (value.charAt(i) != '\n' && value.charAt(i) != '/' && value.charAt(i) != "\\") {
            t += value.charAt(i);
        } else if (value.charAt(i) == '\n') {
            t += "n";
        }
    }
    return t;
}
function stripFullPath(tempFileName, lastDir) {
    fileName = tempFileName;
    filenameStart = 0;
    filenameStart = fileName.lastIndexOf(lastDir);
    if (filenameStart < 0) filenameStart = 0;
    filenameFinish = fileName.length;
    fileName = fileName.substring(filenameStart + lastDir.length, filenameFinish);
    return fileName;
}
function fingerprint_browser() {
    t = ua;
    return t;
}
function fingerprint_os() {
    t = window.navigator.platform;
    return t;
}
function fingerprint_display() {
    t = "";
    if (self.screen) {
        t += screen.colorDepth + SEP + screen.width + SEP + screen.height + SEP + screen.availHeight;
    }
    return t;
}
function fingerprint_software() {
    t = "";
    isFirst = true;
    if (window.navigator.plugins.length > 0) {
        if (opera) {
            temp = "";
            lastDir = "Plugins"; ;
            for (i = 0; i < window.navigator.plugins.length; i++) {
                plugin = window.navigator.plugins[i];
                if (isFirst == true) {
                    temp += stripFullPath(plugin.filename, lastDir);
                    isFirst = false;
                } else {
                    temp += SEP + stripFullPath(plugin.filename, lastDir);
                }
            }
            t = stripIllegalChars(temp);
        } else {
            for (i = 0; i < window.navigator.plugins.length; i++) {
                plugin = window.navigator.plugins[i];
                if (isFirst == true) {
                    t += plugin.filename;
                    isFirst = false;
                } else {
                    t += SEP + plugin.filename;
                }
            }
        }
    } else if (window.navigator.mimeTypes.length > 0) {
        for (i = 0; i < window.navigator.mimeTypes.length; i++) {
            mimeType = window.navigator.mimeTypes[i];
            if (isFirst == true) {
                t += mimeType.type;
                isFirst = false;
            } else {
                t += SEP + mimeType.type;
            }
        }
    } else if (ie) {
        components = new Array("7790769C-0471-11D2-AF11-00C04FA35D02", "89820200-ECBD-11CF-8B85-00AA005B4340",
"283807B5-2C60-11D0-A31D-00AA00B92C03", "4F216970-C90C-11D1-B5C7-0000F8051515",
"44BBA848-CC51-11CF-AAFA-00AA00B6015C", "9381D8F2-0288-11D0-9501-00AA00B911A5",
"4F216970-C90C-11D1-B5C7-0000F8051515", "5A8D6EE0-3E18-11D0-821E-444553540000",
"89820200-ECBD-11CF-8B85-00AA005B4383", "08B0E5C0-4FCB-11CF-AAA5-00401C608555",
"45EA75A0-A269-11D1-B5BF-0000F8051515", "DE5AED00-A4BF-11D1-9948-00C04F98BBC9",
"22D6F312-B0F6-11D0-94AB-0080C74C7E95", "44BBA842-CC51-11CF-AAFA-00AA00B6015B",
"3AF36230-A269-11D1-B5BF-0000F8051515", "44BBA840-CC51-11CF-AAFA-00AA00B6015C",
"CC2A9BA0-3BDD-11D0-821E-444553540000", "08B0E5C0-4FCB-11CF-AAA5-00401C608500",
"D27CDB6E-AE6D-11CF-96B8-444553540000", "2A202491-F00D-11CF-87CC-0020AFEECF20"
);
        document.body.addBehavior("#default#clientCaps");
        for (i = 0; i < components.length; i++) {
            ver = activeXDetect(components[i]);
            if (ver) {
                if (isFirst == true) {
                    t += ver;
                    isFirst = false;
                } else {
                    t += SEP + ver;
                }
            } else {
                t += SEP + "null";
            }
        }
    }
    return t;
}
function form_add_data(fd, name, value) {
    if (fd && fd.length > 0) {
        fd += "&";
    } else {
        fd = "";
    }
    fd += name + '=' + escape(value);
    return fd;
}
function form_add_fingerprint(fd, name, value) {
    fd = form_add_data(fd, name + "d", value);
    return fd;
}
function pstfgrpnt(md5) {
    try {
        a = fingerprint_browser();
    } catch (e) {
        a = '';
    }
    try {
        b = fingerprint_display();
    } catch (e) {
        b = '';
    }
    try {
        c = fingerprint_software();
    } catch (e) {
        c = '';
    }
    try {
        d = fingerprint_os();
    } catch (e) {
        d = '';
    }
    if (md5) {
        a = obs(a);
        b = obs(b);
        c = obs(c);
        d = obs(d);
    }
    return new Array(a, b, c, d);
}
function add_fingerprints() {
    t = "fp_browser=" + fingerprint_browser() + "&fp_display=" + fingerprint_display()
+ "&fp_software=" + fingerprint_software() + "&fb_os=" + fingerprint_os();
    return t;
}
function DSMFingerprint() {
    this.FingerprintId = '';
    this.DMA = '';
    this.City = '';
    this.Region = '';
    this.Country = '';
    this.Fonts = '';
    this.Plugins = '';
    this.UserAgent = '';
    this.IpAddress = '';
    this.Resolution = '';
}
function DSMFinancial(cartId, orderId, level, totalsRev, items) {
    this.CartId = cartId;
    this.OrderId = orderId;
    this.Level = level;
    this.Items = items;
    this.TotalDSRev = totalsRev;
    this.Coupons = [];
    this.MemId = -10;
}
function DSMFinancialItem(objType, objId, objBasePrice, objDSRev, totalRev) {
    this.ObjType = objType;
    this.ObjId = objId;
    this.ObjBasePrice = objBasePrice;
    this.ObjDSRev = objDSRev;
    this.TotalRev = totalRev;
    this.MemId = -10;
}
function DSMActivity(name, affid, objType, pageId, actionType, otherInfos) {
    this.AffId = affid;
    this.ObjType = objType;
    this.PageId = pageId;
    this.ActionType = actionType;
    this.OtherInfos = otherInfos;
    this.Name = name;
    this.AffiliateDomain = '';
    this.MemId = -10;
}
function DSMOtherInfo(name, value) {
    this.Name = name;
    this.Value = value;
}
function DSMetrics() {
    this.availableFonts = ["'ACaslonPro-Regular','Adobe Caslon Pro'", "'AGaramondPro-Regular','Adobe Garamond Pro'", "'AJensonPro-Regular','Adobe Jenson Pro'", "'AvantGarde-CondBold','AvantGarde','Avant Garde'", "'AmericanTypewriter','American Typewriter'", "'AndaleMono','Andale Mono'", "'AmericanTypewriter','American Typewriter'", "'ArialMT','Arial'", "'Baskerville'", "'Calibri'", "'Cambria'", "'Candara'", "'ClarendonBT-Roman','Clarendon','Clarendon BT'", "'Classic-Roman','Classic','Classic Regular'", "'CooperBlackStd','Cooper Std'", "'ClarendonBT-Roman','Clarendon','Clarendon BT'", "'CourierNewPSMT','Courier New'", "'DIN-Bold'", "'DIN-Light'", "'DIN-Regular'", "'Futura'", "'Garamond'", "'GaramondPremrPro','Garamond Premier Pro'", "'Georgia'", "'GillSans','Gill Sans'", "'HelveticaCYBold','Helvetica CY','Helvetica CY Bold'", "'LucidaGrande','Lucida Grande'", "'MarkerFelt-Thin','Marker Felt','Marker Felt Thin'", "'MyriadPro-Regular','Myriad Pro'", "'Palatino-Roman','Palatino'", "'PanicSans','Panic Sans'", "'MarkerFelt-Thin','Marker Felt','Marker Felt Thin'", "'Silkscreen'", "'SketchRockwell','Sketch Rockwell'", "'STHeiti'", "'Times-Bold','Times','Times Bold'", "'TimesNewRomanPSMT','Times New Roman'", "'Verdana'", "'Zapfino'"];
    this.initDSMetrics = function() {
    	var rawData = pstfgrpnt();
    	this.fingerprint.Resolution = obs(rawData[1]);
    	this.fingerprint.Plugins = obs(fingerprint_software());
    	this.fingerprint.UserAgent = obs(navigator.userAgent);
    	var today = new Date();
    	var getTimezoneOffset = today.getTimezoneOffset();
    	var getDate = today.getDate();
    	var getMonth = today.getMonth();
    	var getFullYear = today.getFullYear();
    	var getHours = today.getHours();
    	var getMinutes = today.getMinutes();
    	var getSeconds = today.getSeconds();
    	var getMilliseconds = today.getMilliseconds();
    	if (this.fingerprint.Plugins.length > 32) {
    		this.fingerprint.Plugins = obs(this.fingerprint.Plugins);
    	}
    	if (this.fingerprint.Fonts.length > 32) {
    		this.fingerprint.Fonts = obs(this.fingerprint.Fonts);
    	}
    	if (serverFingerprint != null) {
	    	this.fingerprint.IpAddress = serverFingerprint.IpAddress;
    		this.fingerprint.City = serverFingerprint.City;
    		this.fingerprint.Region = serverFingerprint.Region;
    		this.fingerprint.Country = serverFingerprint.Country;
    		this.fingerprint.DMA = serverFingerprint.DMA;
    	}

    	var cookie = JSON.stringify(this.fingerprint);
    	setCookie("fingerprint.docstoc", cookie, 3650);
    };
    this.fingerprint = new DSMFingerprint();
    this.track = function() {
        var args = Array.prototype.slice.call(arguments);
        dsmetrics.doTrack(args, "false");
    };
    this.tracktest = function() {
        var args = Array.prototype.slice.call(arguments);
        dsmetrics.doTrack(args, "true");
    };
    this.hijackStore = [];
    this.hijackLinkTimeout = 300;
    this.click = function() {
        var args = Array.prototype.slice.call(arguments);
        var tempStorage = [];
        var k = 0;
        var obj;
        var url = '';
        var js = '';
        var id = Math.random();
        id += '';
        var isTesting = 'true';
        for (var i = 0; i < args.length; i++) {
            if (args[i].constructor == Object) {
                obj = args[i];
            }
            if (args[i].constructor == String) {
                isTesting = args[i];
            }
            if (args[i].constructor == DSMActivity) {
                tempStorage[k++] = args[i];
            }
            if (args[i].constructor == DSMFinancial) {
                tempStorage[k++] = args[i];
            }
        }
        if (obj.length > 0) {
            jQuery(obj).click(function() {
                dsmetrics.t(id);
            });
            dsmetrics.hijackStore[dsmetrics.hijackStore.length] = { "id": id, "url": url, "data": tempStorage, "isTesting": isTesting, "js": js };
        }
    };
    this.hijack = function() {
        var args = Array.prototype.slice.call(arguments);
        var tempStorage = [];
        var k = 0;
        var obj;
        var url = '';
        var js = '';
        var id = Math.random();
        id += '';
        var isTesting = 'true';
        for (var i = 0; i < args.length; i++) {
            if (args[i].constructor == Object) {
                obj = args[i];
            }
            if (args[i].constructor == String) {
                isTesting = args[i];
            }
            if (args[i].constructor == DSMActivity) {
                tempStorage[k++] = args[i];
            }
            if (args[i].constructor == DSMFinancial) {
                tempStorage[k++] = args[i];
            }
        }
        if (obj.length > 0) {
            if (jQuery(obj)._soz_tagName() == 'A') {
                if (typeof jQuery(obj).attr('href') == "undefined") {
                    jQuery(obj).click(function() {
                        dsmetrics.t(id);
                    });
                }
                else if (jQuery(obj).attr('href')._soz_startsWith('http://') || jQuery(obj).attr('href')._soz_startsWith('https://') || jQuery(obj).attr('href')._soz_startsWith('/')) {
                    url = jQuery(obj).attr('href');
                    jQuery(obj).attr("href", "javascript:dsmetrics.t('" + id + "');");
                }
                else if (jQuery(obj).attr('href')._soz_startsWith('javascript:')) {
                    js = jQuery(obj).attr('href').substring(11);
                    jQuery(obj).attr("href", "javascript:dsmetrics.t('" + id + "');");
                }
                else {
                    jQuery(obj).click(function() {
                        dsmetrics.t(id);
                    });
                }
            }
            else {
                jQuery(obj).click(function() {
                    dsmetrics.t(id);
                });
            }
            if (jQuery(obj)[0].getAttributeNode('onclick') != null) {
                js += jQuery(obj)[0].getAttributeNode('onclick').nodeValue;
                if (jQuery(obj)[0].getAttributeNode('onclick').nodeValue.indexOf("return false;") > 0) {
                    url = "";
                }
                jQuery(obj)[0].getAttributeNode('onclick').nodeValue = "";
                js = js.replace("return false;", "");
            }
            dsmetrics.hijackStore[dsmetrics.hijackStore.length] = { "id": id, "url": url, "data": tempStorage, "isTesting": isTesting, "js": js };
        }
    };
    this.t = function(id) {
        var args;
        var url = '';
        var isTesting;
        var js = '';
        for (var i = 0; i < dsmetrics.hijackStore.length; i++) {
            if (dsmetrics.hijackStore[i].id == id) {
                args = dsmetrics.hijackStore[i].data;
                url = dsmetrics.hijackStore[i].url;
                isTesting = dsmetrics.hijackStore[i].isTesting;
                js = dsmetrics.hijackStore[i].js;
            }
        }
        dsmetrics.doTrack(args, isTesting);
        if (url != '') {
            setTimeout("dsmetrics.GoTo('" + id + "');", this.hijackLinkTimeout);
        }
        if (js != '') {
            setTimeout(js, this.hijackLinkTimeout);
        }
    };
    this.GoTo = function(id) {
        var url = '';
        for (var i = 0; i < dsmetrics.hijackStore.length; i++) {
            if (dsmetrics.hijackStore[i].id == id) {
                url = dsmetrics.hijackStore[i].url;
            }
        }
        if (url != '') {
            window.location = url;
        }
    };
    this.doTrack = function(args, test) {
        for (var i = 0; i < args.length; i++) {
            if (args[i].constructor == DSMActivity) {
                jQuery.ajax({
                    url: "/metrics/trackactivity",
                    type: 'POST',
                    data: {
                        "data": JSON.stringify(args[i]), "test": test
                    },
                    success: function(data, status) {
                    },
                    error: function(xhr, desc, err) {
                        console.log('error');
                    }
                });
            }
            if (args[i].constructor == DSMFinancial) {
                jQuery.ajax({
                    url: "/metrics/trackfinancial",
                    type: 'POST',
                    data: {
                        "data": JSON.stringify(args[i]), "test": test
                    },
                    success: function(data, status) {
                    },
                    error: function(xhr, desc, err) {
                        console.log('error');
                    }
                });
            }
        }
    };
    this.trackViewerPrint = function(doc_id) {
        dsmetrics.track(new DSMActivity('viewer-print-button', '', dsmetrics.ActivityObjType.NotSet, 0, dsmetrics.ActivityActionType.Click, [new DSMOtherInfo("doc_id", DocumentID)]));
    };
    this.trackViewerDownload = function(doc_id) {
        dsmetrics.track(new DSMActivity('viewer-download-button', '', dsmetrics.ActivityObjType.NotSet, 0, dsmetrics.ActivityActionType.Click, [new DSMOtherInfo("doc_id", DocumentID)]));
    };
    this.FinancialLevel = { SuccessfulPurchase: 0, FailedPurchase: 1 };
    this.FinancialObjType = { Document: 0, Package: 1, Megapackage: 2, Subscription: 3 };
    this.ActivityObjType = { NotSet: 0, InternalAd: 1, Document: 2, Package: 3, Cart: 4, Order: 5, Subscription: 6, MegaPackage: 7, Interest: 8, Segment: 9, Search: 10, SEMAd: 11, SEM: 12, RegisterPopup: 13, LoginPopup: 14, Affiliate: 15, DocumentCompletion: 16  };
    this.ActivityActionType = { None: 0, ItemPurchase: 1, Download: 2, Print: 3, Subscription: 4, Add: 5, Remove: 6, Click: 8, View: 9, CartPurchase: 10, Hover: 11, Search: 12, Error: 99 };
}
String.prototype._soz_startsWith = function(str)
{ return (this.match("^" + str) == str) }
String.prototype._soz_trim = function() {
    return
    (this.replace(/^[\s\xA0]+/, "").replace(/[\s\xA0]+$/, ""))
}
String.prototype._soz_endsWith = function(str)
{ return (this.match(str + "$") == str) }
jQuery.fn._soz_tagName = function() {
    try {
        return this.get(0).tagName;
    }
    catch (Error) {
        return '';
    }
   }
var serverFingerprint = null;
var dsmetrics = new DSMetrics();
var dsmetrics_flash_temp = document.createElement('div');
function populateFontList(fontArr) {
    var temp = '';
    for (var i = 0; i < fontArr.length; i++) {
        temp += fontArr[i] + ' | ';
    }
    dsmetrics.fingerprint.Fonts = obs(temp);
    document.body.removeChild(dsmetrics_flash_temp);
    dsmetrics.initDSMetrics();
}
function initDSMetrics(fingerprintData) {
    var t = '<object id="fontListSWF" name="fontListSWF" \
 type="application/x-shockwave-flash" \
 data="/swf/FontList.swf" width="1" height="1" \
> \
    <param name="movie" value="/swf/FontList.swf"> \
 <embed src="/swf/FontList.swf" width="1" height="1"></embed> \
</object> \
</body>';
    dsmetrics_flash_temp.innerHTML = t;
    dsmetrics_flash_temp.setAttribute('style', 'display: block');
    document.body.appendChild(dsmetrics_flash_temp);

    serverFingerprint = eval('(' + fingerprintData + ')');
    setTimeout('initDSMetrics_Fallback()', 1000);
}
function initDSMetrics_Fallback() {
    if (dsmetrics.fingerprint.Fonts == '') {
        dsmetrics.initDSMetrics();
        document.body.removeChild(dsmetrics_flash_temp);
    }
}