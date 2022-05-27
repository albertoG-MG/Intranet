(() => {
  var __create = Object.create;
  var __defProp = Object.defineProperty;
  var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __getProtoOf = Object.getPrototypeOf;
  var __hasOwnProp = Object.prototype.hasOwnProperty;
  var __commonJS = (cb, mod) => function __require() {
    return mod || (0, cb[__getOwnPropNames(cb)[0]])((mod = { exports: {} }).exports, mod), mod.exports;
  };
  var __copyProps = (to, from, except, desc) => {
    if (from && typeof from === "object" || typeof from === "function") {
      for (let key of __getOwnPropNames(from))
        if (!__hasOwnProp.call(to, key) && key !== except)
          __defProp(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc(from, key)) || desc.enumerable });
    }
    return to;
  };
  var __toESM = (mod, isNodeMode, target) => (target = mod != null ? __create(__getProtoOf(mod)) : {}, __copyProps(isNodeMode || !mod || !mod.__esModule ? __defProp(target, "default", { value: mod, enumerable: true }) : target, mod));

  // node_modules/jquery/dist/jquery.js
  var require_jquery = __commonJS({
    "node_modules/jquery/dist/jquery.js"(exports, module) {
      (function(global, factory) {
        "use strict";
        if (typeof module === "object" && typeof module.exports === "object") {
          module.exports = global.document ? factory(global, true) : function(w) {
            if (!w.document) {
              throw new Error("jQuery requires a window with a document");
            }
            return factory(w);
          };
        } else {
          factory(global);
        }
      })(typeof window !== "undefined" ? window : exports, function(window2, noGlobal) {
        "use strict";
        var arr = [];
        var getProto = Object.getPrototypeOf;
        var slice = arr.slice;
        var flat = arr.flat ? function(array) {
          return arr.flat.call(array);
        } : function(array) {
          return arr.concat.apply([], array);
        };
        var push = arr.push;
        var indexOf = arr.indexOf;
        var class2type = {};
        var toString = class2type.toString;
        var hasOwn = class2type.hasOwnProperty;
        var fnToString = hasOwn.toString;
        var ObjectFunctionString = fnToString.call(Object);
        var support = {};
        var isFunction = function isFunction2(obj) {
          return typeof obj === "function" && typeof obj.nodeType !== "number" && typeof obj.item !== "function";
        };
        var isWindow = function isWindow2(obj) {
          return obj != null && obj === obj.window;
        };
        var document2 = window2.document;
        var preservedScriptAttributes = {
          type: true,
          src: true,
          nonce: true,
          noModule: true
        };
        function DOMEval(code, node, doc) {
          doc = doc || document2;
          var i, val, script = doc.createElement("script");
          script.text = code;
          if (node) {
            for (i in preservedScriptAttributes) {
              val = node[i] || node.getAttribute && node.getAttribute(i);
              if (val) {
                script.setAttribute(i, val);
              }
            }
          }
          doc.head.appendChild(script).parentNode.removeChild(script);
        }
        function toType(obj) {
          if (obj == null) {
            return obj + "";
          }
          return typeof obj === "object" || typeof obj === "function" ? class2type[toString.call(obj)] || "object" : typeof obj;
        }
        var version = "3.6.0", jQuery2 = function(selector, context) {
          return new jQuery2.fn.init(selector, context);
        };
        jQuery2.fn = jQuery2.prototype = {
          jquery: version,
          constructor: jQuery2,
          length: 0,
          toArray: function() {
            return slice.call(this);
          },
          get: function(num) {
            if (num == null) {
              return slice.call(this);
            }
            return num < 0 ? this[num + this.length] : this[num];
          },
          pushStack: function(elems) {
            var ret = jQuery2.merge(this.constructor(), elems);
            ret.prevObject = this;
            return ret;
          },
          each: function(callback) {
            return jQuery2.each(this, callback);
          },
          map: function(callback) {
            return this.pushStack(jQuery2.map(this, function(elem, i) {
              return callback.call(elem, i, elem);
            }));
          },
          slice: function() {
            return this.pushStack(slice.apply(this, arguments));
          },
          first: function() {
            return this.eq(0);
          },
          last: function() {
            return this.eq(-1);
          },
          even: function() {
            return this.pushStack(jQuery2.grep(this, function(_elem, i) {
              return (i + 1) % 2;
            }));
          },
          odd: function() {
            return this.pushStack(jQuery2.grep(this, function(_elem, i) {
              return i % 2;
            }));
          },
          eq: function(i) {
            var len = this.length, j = +i + (i < 0 ? len : 0);
            return this.pushStack(j >= 0 && j < len ? [this[j]] : []);
          },
          end: function() {
            return this.prevObject || this.constructor();
          },
          push,
          sort: arr.sort,
          splice: arr.splice
        };
        jQuery2.extend = jQuery2.fn.extend = function() {
          var options, name, src, copy, copyIsArray, clone, target = arguments[0] || {}, i = 1, length = arguments.length, deep = false;
          if (typeof target === "boolean") {
            deep = target;
            target = arguments[i] || {};
            i++;
          }
          if (typeof target !== "object" && !isFunction(target)) {
            target = {};
          }
          if (i === length) {
            target = this;
            i--;
          }
          for (; i < length; i++) {
            if ((options = arguments[i]) != null) {
              for (name in options) {
                copy = options[name];
                if (name === "__proto__" || target === copy) {
                  continue;
                }
                if (deep && copy && (jQuery2.isPlainObject(copy) || (copyIsArray = Array.isArray(copy)))) {
                  src = target[name];
                  if (copyIsArray && !Array.isArray(src)) {
                    clone = [];
                  } else if (!copyIsArray && !jQuery2.isPlainObject(src)) {
                    clone = {};
                  } else {
                    clone = src;
                  }
                  copyIsArray = false;
                  target[name] = jQuery2.extend(deep, clone, copy);
                } else if (copy !== void 0) {
                  target[name] = copy;
                }
              }
            }
          }
          return target;
        };
        jQuery2.extend({
          expando: "jQuery" + (version + Math.random()).replace(/\D/g, ""),
          isReady: true,
          error: function(msg) {
            throw new Error(msg);
          },
          noop: function() {
          },
          isPlainObject: function(obj) {
            var proto, Ctor;
            if (!obj || toString.call(obj) !== "[object Object]") {
              return false;
            }
            proto = getProto(obj);
            if (!proto) {
              return true;
            }
            Ctor = hasOwn.call(proto, "constructor") && proto.constructor;
            return typeof Ctor === "function" && fnToString.call(Ctor) === ObjectFunctionString;
          },
          isEmptyObject: function(obj) {
            var name;
            for (name in obj) {
              return false;
            }
            return true;
          },
          globalEval: function(code, options, doc) {
            DOMEval(code, { nonce: options && options.nonce }, doc);
          },
          each: function(obj, callback) {
            var length, i = 0;
            if (isArrayLike(obj)) {
              length = obj.length;
              for (; i < length; i++) {
                if (callback.call(obj[i], i, obj[i]) === false) {
                  break;
                }
              }
            } else {
              for (i in obj) {
                if (callback.call(obj[i], i, obj[i]) === false) {
                  break;
                }
              }
            }
            return obj;
          },
          makeArray: function(arr2, results) {
            var ret = results || [];
            if (arr2 != null) {
              if (isArrayLike(Object(arr2))) {
                jQuery2.merge(ret, typeof arr2 === "string" ? [arr2] : arr2);
              } else {
                push.call(ret, arr2);
              }
            }
            return ret;
          },
          inArray: function(elem, arr2, i) {
            return arr2 == null ? -1 : indexOf.call(arr2, elem, i);
          },
          merge: function(first, second) {
            var len = +second.length, j = 0, i = first.length;
            for (; j < len; j++) {
              first[i++] = second[j];
            }
            first.length = i;
            return first;
          },
          grep: function(elems, callback, invert) {
            var callbackInverse, matches = [], i = 0, length = elems.length, callbackExpect = !invert;
            for (; i < length; i++) {
              callbackInverse = !callback(elems[i], i);
              if (callbackInverse !== callbackExpect) {
                matches.push(elems[i]);
              }
            }
            return matches;
          },
          map: function(elems, callback, arg) {
            var length, value, i = 0, ret = [];
            if (isArrayLike(elems)) {
              length = elems.length;
              for (; i < length; i++) {
                value = callback(elems[i], i, arg);
                if (value != null) {
                  ret.push(value);
                }
              }
            } else {
              for (i in elems) {
                value = callback(elems[i], i, arg);
                if (value != null) {
                  ret.push(value);
                }
              }
            }
            return flat(ret);
          },
          guid: 1,
          support
        });
        if (typeof Symbol === "function") {
          jQuery2.fn[Symbol.iterator] = arr[Symbol.iterator];
        }
        jQuery2.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(_i, name) {
          class2type["[object " + name + "]"] = name.toLowerCase();
        });
        function isArrayLike(obj) {
          var length = !!obj && "length" in obj && obj.length, type = toType(obj);
          if (isFunction(obj) || isWindow(obj)) {
            return false;
          }
          return type === "array" || length === 0 || typeof length === "number" && length > 0 && length - 1 in obj;
        }
        var Sizzle = function(window3) {
          var i, support2, Expr, getText, isXML, tokenize, compile, select, outermostContext, sortInput, hasDuplicate, setDocument, document3, docElem, documentIsHTML, rbuggyQSA, rbuggyMatches, matches, contains, expando = "sizzle" + 1 * new Date(), preferredDoc = window3.document, dirruns = 0, done = 0, classCache = createCache(), tokenCache = createCache(), compilerCache = createCache(), nonnativeSelectorCache = createCache(), sortOrder = function(a, b) {
            if (a === b) {
              hasDuplicate = true;
            }
            return 0;
          }, hasOwn2 = {}.hasOwnProperty, arr2 = [], pop = arr2.pop, pushNative = arr2.push, push2 = arr2.push, slice2 = arr2.slice, indexOf2 = function(list, elem) {
            var i2 = 0, len = list.length;
            for (; i2 < len; i2++) {
              if (list[i2] === elem) {
                return i2;
              }
            }
            return -1;
          }, booleans = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", whitespace = "[\\x20\\t\\r\\n\\f]", identifier = "(?:\\\\[\\da-fA-F]{1,6}" + whitespace + "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+", attributes = "\\[" + whitespace + "*(" + identifier + ")(?:" + whitespace + "*([*^$|!~]?=)" + whitespace + `*(?:'((?:\\\\.|[^\\\\'])*)'|"((?:\\\\.|[^\\\\"])*)"|(` + identifier + "))|)" + whitespace + "*\\]", pseudos = ":(" + identifier + `)(?:\\((('((?:\\\\.|[^\\\\'])*)'|"((?:\\\\.|[^\\\\"])*)")|((?:\\\\.|[^\\\\()[\\]]|` + attributes + ")*)|.*)\\)|)", rwhitespace = new RegExp(whitespace + "+", "g"), rtrim2 = new RegExp("^" + whitespace + "+|((?:^|[^\\\\])(?:\\\\.)*)" + whitespace + "+$", "g"), rcomma = new RegExp("^" + whitespace + "*," + whitespace + "*"), rcombinators = new RegExp("^" + whitespace + "*([>+~]|" + whitespace + ")" + whitespace + "*"), rdescend = new RegExp(whitespace + "|>"), rpseudo = new RegExp(pseudos), ridentifier = new RegExp("^" + identifier + "$"), matchExpr = {
            "ID": new RegExp("^#(" + identifier + ")"),
            "CLASS": new RegExp("^\\.(" + identifier + ")"),
            "TAG": new RegExp("^(" + identifier + "|[*])"),
            "ATTR": new RegExp("^" + attributes),
            "PSEUDO": new RegExp("^" + pseudos),
            "CHILD": new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" + whitespace + "*(?:([+-]|)" + whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i"),
            "bool": new RegExp("^(?:" + booleans + ")$", "i"),
            "needsContext": new RegExp("^" + whitespace + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace + "*((?:-\\d)?\\d*)" + whitespace + "*\\)|)(?=[^-]|$)", "i")
          }, rhtml2 = /HTML$/i, rinputs = /^(?:input|select|textarea|button)$/i, rheader = /^h\d$/i, rnative = /^[^{]+\{\s*\[native \w/, rquickExpr2 = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, rsibling = /[+~]/, runescape = new RegExp("\\\\[\\da-fA-F]{1,6}" + whitespace + "?|\\\\([^\\r\\n\\f])", "g"), funescape = function(escape, nonHex) {
            var high = "0x" + escape.slice(1) - 65536;
            return nonHex ? nonHex : high < 0 ? String.fromCharCode(high + 65536) : String.fromCharCode(high >> 10 | 55296, high & 1023 | 56320);
          }, rcssescape = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, fcssescape = function(ch, asCodePoint) {
            if (asCodePoint) {
              if (ch === "\0") {
                return "\uFFFD";
              }
              return ch.slice(0, -1) + "\\" + ch.charCodeAt(ch.length - 1).toString(16) + " ";
            }
            return "\\" + ch;
          }, unloadHandler = function() {
            setDocument();
          }, inDisabledFieldset = addCombinator(function(elem) {
            return elem.disabled === true && elem.nodeName.toLowerCase() === "fieldset";
          }, { dir: "parentNode", next: "legend" });
          try {
            push2.apply(arr2 = slice2.call(preferredDoc.childNodes), preferredDoc.childNodes);
            arr2[preferredDoc.childNodes.length].nodeType;
          } catch (e) {
            push2 = {
              apply: arr2.length ? function(target, els) {
                pushNative.apply(target, slice2.call(els));
              } : function(target, els) {
                var j = target.length, i2 = 0;
                while (target[j++] = els[i2++]) {
                }
                target.length = j - 1;
              }
            };
          }
          function Sizzle2(selector, context, results, seed) {
            var m, i2, elem, nid, match, groups, newSelector, newContext = context && context.ownerDocument, nodeType = context ? context.nodeType : 9;
            results = results || [];
            if (typeof selector !== "string" || !selector || nodeType !== 1 && nodeType !== 9 && nodeType !== 11) {
              return results;
            }
            if (!seed) {
              setDocument(context);
              context = context || document3;
              if (documentIsHTML) {
                if (nodeType !== 11 && (match = rquickExpr2.exec(selector))) {
                  if (m = match[1]) {
                    if (nodeType === 9) {
                      if (elem = context.getElementById(m)) {
                        if (elem.id === m) {
                          results.push(elem);
                          return results;
                        }
                      } else {
                        return results;
                      }
                    } else {
                      if (newContext && (elem = newContext.getElementById(m)) && contains(context, elem) && elem.id === m) {
                        results.push(elem);
                        return results;
                      }
                    }
                  } else if (match[2]) {
                    push2.apply(results, context.getElementsByTagName(selector));
                    return results;
                  } else if ((m = match[3]) && support2.getElementsByClassName && context.getElementsByClassName) {
                    push2.apply(results, context.getElementsByClassName(m));
                    return results;
                  }
                }
                if (support2.qsa && !nonnativeSelectorCache[selector + " "] && (!rbuggyQSA || !rbuggyQSA.test(selector)) && (nodeType !== 1 || context.nodeName.toLowerCase() !== "object")) {
                  newSelector = selector;
                  newContext = context;
                  if (nodeType === 1 && (rdescend.test(selector) || rcombinators.test(selector))) {
                    newContext = rsibling.test(selector) && testContext(context.parentNode) || context;
                    if (newContext !== context || !support2.scope) {
                      if (nid = context.getAttribute("id")) {
                        nid = nid.replace(rcssescape, fcssescape);
                      } else {
                        context.setAttribute("id", nid = expando);
                      }
                    }
                    groups = tokenize(selector);
                    i2 = groups.length;
                    while (i2--) {
                      groups[i2] = (nid ? "#" + nid : ":scope") + " " + toSelector(groups[i2]);
                    }
                    newSelector = groups.join(",");
                  }
                  try {
                    push2.apply(results, newContext.querySelectorAll(newSelector));
                    return results;
                  } catch (qsaError) {
                    nonnativeSelectorCache(selector, true);
                  } finally {
                    if (nid === expando) {
                      context.removeAttribute("id");
                    }
                  }
                }
              }
            }
            return select(selector.replace(rtrim2, "$1"), context, results, seed);
          }
          function createCache() {
            var keys = [];
            function cache(key, value) {
              if (keys.push(key + " ") > Expr.cacheLength) {
                delete cache[keys.shift()];
              }
              return cache[key + " "] = value;
            }
            return cache;
          }
          function markFunction(fn) {
            fn[expando] = true;
            return fn;
          }
          function assert(fn) {
            var el = document3.createElement("fieldset");
            try {
              return !!fn(el);
            } catch (e) {
              return false;
            } finally {
              if (el.parentNode) {
                el.parentNode.removeChild(el);
              }
              el = null;
            }
          }
          function addHandle(attrs, handler) {
            var arr3 = attrs.split("|"), i2 = arr3.length;
            while (i2--) {
              Expr.attrHandle[arr3[i2]] = handler;
            }
          }
          function siblingCheck(a, b) {
            var cur = b && a, diff = cur && a.nodeType === 1 && b.nodeType === 1 && a.sourceIndex - b.sourceIndex;
            if (diff) {
              return diff;
            }
            if (cur) {
              while (cur = cur.nextSibling) {
                if (cur === b) {
                  return -1;
                }
              }
            }
            return a ? 1 : -1;
          }
          function createInputPseudo(type) {
            return function(elem) {
              var name = elem.nodeName.toLowerCase();
              return name === "input" && elem.type === type;
            };
          }
          function createButtonPseudo(type) {
            return function(elem) {
              var name = elem.nodeName.toLowerCase();
              return (name === "input" || name === "button") && elem.type === type;
            };
          }
          function createDisabledPseudo(disabled) {
            return function(elem) {
              if ("form" in elem) {
                if (elem.parentNode && elem.disabled === false) {
                  if ("label" in elem) {
                    if ("label" in elem.parentNode) {
                      return elem.parentNode.disabled === disabled;
                    } else {
                      return elem.disabled === disabled;
                    }
                  }
                  return elem.isDisabled === disabled || elem.isDisabled !== !disabled && inDisabledFieldset(elem) === disabled;
                }
                return elem.disabled === disabled;
              } else if ("label" in elem) {
                return elem.disabled === disabled;
              }
              return false;
            };
          }
          function createPositionalPseudo(fn) {
            return markFunction(function(argument) {
              argument = +argument;
              return markFunction(function(seed, matches2) {
                var j, matchIndexes = fn([], seed.length, argument), i2 = matchIndexes.length;
                while (i2--) {
                  if (seed[j = matchIndexes[i2]]) {
                    seed[j] = !(matches2[j] = seed[j]);
                  }
                }
              });
            });
          }
          function testContext(context) {
            return context && typeof context.getElementsByTagName !== "undefined" && context;
          }
          support2 = Sizzle2.support = {};
          isXML = Sizzle2.isXML = function(elem) {
            var namespace = elem && elem.namespaceURI, docElem2 = elem && (elem.ownerDocument || elem).documentElement;
            return !rhtml2.test(namespace || docElem2 && docElem2.nodeName || "HTML");
          };
          setDocument = Sizzle2.setDocument = function(node) {
            var hasCompare, subWindow, doc = node ? node.ownerDocument || node : preferredDoc;
            if (doc == document3 || doc.nodeType !== 9 || !doc.documentElement) {
              return document3;
            }
            document3 = doc;
            docElem = document3.documentElement;
            documentIsHTML = !isXML(document3);
            if (preferredDoc != document3 && (subWindow = document3.defaultView) && subWindow.top !== subWindow) {
              if (subWindow.addEventListener) {
                subWindow.addEventListener("unload", unloadHandler, false);
              } else if (subWindow.attachEvent) {
                subWindow.attachEvent("onunload", unloadHandler);
              }
            }
            support2.scope = assert(function(el) {
              docElem.appendChild(el).appendChild(document3.createElement("div"));
              return typeof el.querySelectorAll !== "undefined" && !el.querySelectorAll(":scope fieldset div").length;
            });
            support2.attributes = assert(function(el) {
              el.className = "i";
              return !el.getAttribute("className");
            });
            support2.getElementsByTagName = assert(function(el) {
              el.appendChild(document3.createComment(""));
              return !el.getElementsByTagName("*").length;
            });
            support2.getElementsByClassName = rnative.test(document3.getElementsByClassName);
            support2.getById = assert(function(el) {
              docElem.appendChild(el).id = expando;
              return !document3.getElementsByName || !document3.getElementsByName(expando).length;
            });
            if (support2.getById) {
              Expr.filter["ID"] = function(id) {
                var attrId = id.replace(runescape, funescape);
                return function(elem) {
                  return elem.getAttribute("id") === attrId;
                };
              };
              Expr.find["ID"] = function(id, context) {
                if (typeof context.getElementById !== "undefined" && documentIsHTML) {
                  var elem = context.getElementById(id);
                  return elem ? [elem] : [];
                }
              };
            } else {
              Expr.filter["ID"] = function(id) {
                var attrId = id.replace(runescape, funescape);
                return function(elem) {
                  var node2 = typeof elem.getAttributeNode !== "undefined" && elem.getAttributeNode("id");
                  return node2 && node2.value === attrId;
                };
              };
              Expr.find["ID"] = function(id, context) {
                if (typeof context.getElementById !== "undefined" && documentIsHTML) {
                  var node2, i2, elems, elem = context.getElementById(id);
                  if (elem) {
                    node2 = elem.getAttributeNode("id");
                    if (node2 && node2.value === id) {
                      return [elem];
                    }
                    elems = context.getElementsByName(id);
                    i2 = 0;
                    while (elem = elems[i2++]) {
                      node2 = elem.getAttributeNode("id");
                      if (node2 && node2.value === id) {
                        return [elem];
                      }
                    }
                  }
                  return [];
                }
              };
            }
            Expr.find["TAG"] = support2.getElementsByTagName ? function(tag, context) {
              if (typeof context.getElementsByTagName !== "undefined") {
                return context.getElementsByTagName(tag);
              } else if (support2.qsa) {
                return context.querySelectorAll(tag);
              }
            } : function(tag, context) {
              var elem, tmp = [], i2 = 0, results = context.getElementsByTagName(tag);
              if (tag === "*") {
                while (elem = results[i2++]) {
                  if (elem.nodeType === 1) {
                    tmp.push(elem);
                  }
                }
                return tmp;
              }
              return results;
            };
            Expr.find["CLASS"] = support2.getElementsByClassName && function(className, context) {
              if (typeof context.getElementsByClassName !== "undefined" && documentIsHTML) {
                return context.getElementsByClassName(className);
              }
            };
            rbuggyMatches = [];
            rbuggyQSA = [];
            if (support2.qsa = rnative.test(document3.querySelectorAll)) {
              assert(function(el) {
                var input;
                docElem.appendChild(el).innerHTML = "<a id='" + expando + "'></a><select id='" + expando + "-\r\\' msallowcapture=''><option selected=''></option></select>";
                if (el.querySelectorAll("[msallowcapture^='']").length) {
                  rbuggyQSA.push("[*^$]=" + whitespace + `*(?:''|"")`);
                }
                if (!el.querySelectorAll("[selected]").length) {
                  rbuggyQSA.push("\\[" + whitespace + "*(?:value|" + booleans + ")");
                }
                if (!el.querySelectorAll("[id~=" + expando + "-]").length) {
                  rbuggyQSA.push("~=");
                }
                input = document3.createElement("input");
                input.setAttribute("name", "");
                el.appendChild(input);
                if (!el.querySelectorAll("[name='']").length) {
                  rbuggyQSA.push("\\[" + whitespace + "*name" + whitespace + "*=" + whitespace + `*(?:''|"")`);
                }
                if (!el.querySelectorAll(":checked").length) {
                  rbuggyQSA.push(":checked");
                }
                if (!el.querySelectorAll("a#" + expando + "+*").length) {
                  rbuggyQSA.push(".#.+[+~]");
                }
                el.querySelectorAll("\\\f");
                rbuggyQSA.push("[\\r\\n\\f]");
              });
              assert(function(el) {
                el.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                var input = document3.createElement("input");
                input.setAttribute("type", "hidden");
                el.appendChild(input).setAttribute("name", "D");
                if (el.querySelectorAll("[name=d]").length) {
                  rbuggyQSA.push("name" + whitespace + "*[*^$|!~]?=");
                }
                if (el.querySelectorAll(":enabled").length !== 2) {
                  rbuggyQSA.push(":enabled", ":disabled");
                }
                docElem.appendChild(el).disabled = true;
                if (el.querySelectorAll(":disabled").length !== 2) {
                  rbuggyQSA.push(":enabled", ":disabled");
                }
                el.querySelectorAll("*,:x");
                rbuggyQSA.push(",.*:");
              });
            }
            if (support2.matchesSelector = rnative.test(matches = docElem.matches || docElem.webkitMatchesSelector || docElem.mozMatchesSelector || docElem.oMatchesSelector || docElem.msMatchesSelector)) {
              assert(function(el) {
                support2.disconnectedMatch = matches.call(el, "*");
                matches.call(el, "[s!='']:x");
                rbuggyMatches.push("!=", pseudos);
              });
            }
            rbuggyQSA = rbuggyQSA.length && new RegExp(rbuggyQSA.join("|"));
            rbuggyMatches = rbuggyMatches.length && new RegExp(rbuggyMatches.join("|"));
            hasCompare = rnative.test(docElem.compareDocumentPosition);
            contains = hasCompare || rnative.test(docElem.contains) ? function(a, b) {
              var adown = a.nodeType === 9 ? a.documentElement : a, bup = b && b.parentNode;
              return a === bup || !!(bup && bup.nodeType === 1 && (adown.contains ? adown.contains(bup) : a.compareDocumentPosition && a.compareDocumentPosition(bup) & 16));
            } : function(a, b) {
              if (b) {
                while (b = b.parentNode) {
                  if (b === a) {
                    return true;
                  }
                }
              }
              return false;
            };
            sortOrder = hasCompare ? function(a, b) {
              if (a === b) {
                hasDuplicate = true;
                return 0;
              }
              var compare = !a.compareDocumentPosition - !b.compareDocumentPosition;
              if (compare) {
                return compare;
              }
              compare = (a.ownerDocument || a) == (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1;
              if (compare & 1 || !support2.sortDetached && b.compareDocumentPosition(a) === compare) {
                if (a == document3 || a.ownerDocument == preferredDoc && contains(preferredDoc, a)) {
                  return -1;
                }
                if (b == document3 || b.ownerDocument == preferredDoc && contains(preferredDoc, b)) {
                  return 1;
                }
                return sortInput ? indexOf2(sortInput, a) - indexOf2(sortInput, b) : 0;
              }
              return compare & 4 ? -1 : 1;
            } : function(a, b) {
              if (a === b) {
                hasDuplicate = true;
                return 0;
              }
              var cur, i2 = 0, aup = a.parentNode, bup = b.parentNode, ap = [a], bp = [b];
              if (!aup || !bup) {
                return a == document3 ? -1 : b == document3 ? 1 : aup ? -1 : bup ? 1 : sortInput ? indexOf2(sortInput, a) - indexOf2(sortInput, b) : 0;
              } else if (aup === bup) {
                return siblingCheck(a, b);
              }
              cur = a;
              while (cur = cur.parentNode) {
                ap.unshift(cur);
              }
              cur = b;
              while (cur = cur.parentNode) {
                bp.unshift(cur);
              }
              while (ap[i2] === bp[i2]) {
                i2++;
              }
              return i2 ? siblingCheck(ap[i2], bp[i2]) : ap[i2] == preferredDoc ? -1 : bp[i2] == preferredDoc ? 1 : 0;
            };
            return document3;
          };
          Sizzle2.matches = function(expr, elements) {
            return Sizzle2(expr, null, null, elements);
          };
          Sizzle2.matchesSelector = function(elem, expr) {
            setDocument(elem);
            if (support2.matchesSelector && documentIsHTML && !nonnativeSelectorCache[expr + " "] && (!rbuggyMatches || !rbuggyMatches.test(expr)) && (!rbuggyQSA || !rbuggyQSA.test(expr))) {
              try {
                var ret = matches.call(elem, expr);
                if (ret || support2.disconnectedMatch || elem.document && elem.document.nodeType !== 11) {
                  return ret;
                }
              } catch (e) {
                nonnativeSelectorCache(expr, true);
              }
            }
            return Sizzle2(expr, document3, null, [elem]).length > 0;
          };
          Sizzle2.contains = function(context, elem) {
            if ((context.ownerDocument || context) != document3) {
              setDocument(context);
            }
            return contains(context, elem);
          };
          Sizzle2.attr = function(elem, name) {
            if ((elem.ownerDocument || elem) != document3) {
              setDocument(elem);
            }
            var fn = Expr.attrHandle[name.toLowerCase()], val = fn && hasOwn2.call(Expr.attrHandle, name.toLowerCase()) ? fn(elem, name, !documentIsHTML) : void 0;
            return val !== void 0 ? val : support2.attributes || !documentIsHTML ? elem.getAttribute(name) : (val = elem.getAttributeNode(name)) && val.specified ? val.value : null;
          };
          Sizzle2.escape = function(sel) {
            return (sel + "").replace(rcssescape, fcssescape);
          };
          Sizzle2.error = function(msg) {
            throw new Error("Syntax error, unrecognized expression: " + msg);
          };
          Sizzle2.uniqueSort = function(results) {
            var elem, duplicates = [], j = 0, i2 = 0;
            hasDuplicate = !support2.detectDuplicates;
            sortInput = !support2.sortStable && results.slice(0);
            results.sort(sortOrder);
            if (hasDuplicate) {
              while (elem = results[i2++]) {
                if (elem === results[i2]) {
                  j = duplicates.push(i2);
                }
              }
              while (j--) {
                results.splice(duplicates[j], 1);
              }
            }
            sortInput = null;
            return results;
          };
          getText = Sizzle2.getText = function(elem) {
            var node, ret = "", i2 = 0, nodeType = elem.nodeType;
            if (!nodeType) {
              while (node = elem[i2++]) {
                ret += getText(node);
              }
            } else if (nodeType === 1 || nodeType === 9 || nodeType === 11) {
              if (typeof elem.textContent === "string") {
                return elem.textContent;
              } else {
                for (elem = elem.firstChild; elem; elem = elem.nextSibling) {
                  ret += getText(elem);
                }
              }
            } else if (nodeType === 3 || nodeType === 4) {
              return elem.nodeValue;
            }
            return ret;
          };
          Expr = Sizzle2.selectors = {
            cacheLength: 50,
            createPseudo: markFunction,
            match: matchExpr,
            attrHandle: {},
            find: {},
            relative: {
              ">": { dir: "parentNode", first: true },
              " ": { dir: "parentNode" },
              "+": { dir: "previousSibling", first: true },
              "~": { dir: "previousSibling" }
            },
            preFilter: {
              "ATTR": function(match) {
                match[1] = match[1].replace(runescape, funescape);
                match[3] = (match[3] || match[4] || match[5] || "").replace(runescape, funescape);
                if (match[2] === "~=") {
                  match[3] = " " + match[3] + " ";
                }
                return match.slice(0, 4);
              },
              "CHILD": function(match) {
                match[1] = match[1].toLowerCase();
                if (match[1].slice(0, 3) === "nth") {
                  if (!match[3]) {
                    Sizzle2.error(match[0]);
                  }
                  match[4] = +(match[4] ? match[5] + (match[6] || 1) : 2 * (match[3] === "even" || match[3] === "odd"));
                  match[5] = +(match[7] + match[8] || match[3] === "odd");
                } else if (match[3]) {
                  Sizzle2.error(match[0]);
                }
                return match;
              },
              "PSEUDO": function(match) {
                var excess, unquoted = !match[6] && match[2];
                if (matchExpr["CHILD"].test(match[0])) {
                  return null;
                }
                if (match[3]) {
                  match[2] = match[4] || match[5] || "";
                } else if (unquoted && rpseudo.test(unquoted) && (excess = tokenize(unquoted, true)) && (excess = unquoted.indexOf(")", unquoted.length - excess) - unquoted.length)) {
                  match[0] = match[0].slice(0, excess);
                  match[2] = unquoted.slice(0, excess);
                }
                return match.slice(0, 3);
              }
            },
            filter: {
              "TAG": function(nodeNameSelector) {
                var nodeName2 = nodeNameSelector.replace(runescape, funescape).toLowerCase();
                return nodeNameSelector === "*" ? function() {
                  return true;
                } : function(elem) {
                  return elem.nodeName && elem.nodeName.toLowerCase() === nodeName2;
                };
              },
              "CLASS": function(className) {
                var pattern = classCache[className + " "];
                return pattern || (pattern = new RegExp("(^|" + whitespace + ")" + className + "(" + whitespace + "|$)")) && classCache(className, function(elem) {
                  return pattern.test(typeof elem.className === "string" && elem.className || typeof elem.getAttribute !== "undefined" && elem.getAttribute("class") || "");
                });
              },
              "ATTR": function(name, operator, check) {
                return function(elem) {
                  var result = Sizzle2.attr(elem, name);
                  if (result == null) {
                    return operator === "!=";
                  }
                  if (!operator) {
                    return true;
                  }
                  result += "";
                  return operator === "=" ? result === check : operator === "!=" ? result !== check : operator === "^=" ? check && result.indexOf(check) === 0 : operator === "*=" ? check && result.indexOf(check) > -1 : operator === "$=" ? check && result.slice(-check.length) === check : operator === "~=" ? (" " + result.replace(rwhitespace, " ") + " ").indexOf(check) > -1 : operator === "|=" ? result === check || result.slice(0, check.length + 1) === check + "-" : false;
                };
              },
              "CHILD": function(type, what, _argument, first, last) {
                var simple = type.slice(0, 3) !== "nth", forward = type.slice(-4) !== "last", ofType = what === "of-type";
                return first === 1 && last === 0 ? function(elem) {
                  return !!elem.parentNode;
                } : function(elem, _context, xml) {
                  var cache, uniqueCache, outerCache, node, nodeIndex, start, dir2 = simple !== forward ? "nextSibling" : "previousSibling", parent = elem.parentNode, name = ofType && elem.nodeName.toLowerCase(), useCache = !xml && !ofType, diff = false;
                  if (parent) {
                    if (simple) {
                      while (dir2) {
                        node = elem;
                        while (node = node[dir2]) {
                          if (ofType ? node.nodeName.toLowerCase() === name : node.nodeType === 1) {
                            return false;
                          }
                        }
                        start = dir2 = type === "only" && !start && "nextSibling";
                      }
                      return true;
                    }
                    start = [forward ? parent.firstChild : parent.lastChild];
                    if (forward && useCache) {
                      node = parent;
                      outerCache = node[expando] || (node[expando] = {});
                      uniqueCache = outerCache[node.uniqueID] || (outerCache[node.uniqueID] = {});
                      cache = uniqueCache[type] || [];
                      nodeIndex = cache[0] === dirruns && cache[1];
                      diff = nodeIndex && cache[2];
                      node = nodeIndex && parent.childNodes[nodeIndex];
                      while (node = ++nodeIndex && node && node[dir2] || (diff = nodeIndex = 0) || start.pop()) {
                        if (node.nodeType === 1 && ++diff && node === elem) {
                          uniqueCache[type] = [dirruns, nodeIndex, diff];
                          break;
                        }
                      }
                    } else {
                      if (useCache) {
                        node = elem;
                        outerCache = node[expando] || (node[expando] = {});
                        uniqueCache = outerCache[node.uniqueID] || (outerCache[node.uniqueID] = {});
                        cache = uniqueCache[type] || [];
                        nodeIndex = cache[0] === dirruns && cache[1];
                        diff = nodeIndex;
                      }
                      if (diff === false) {
                        while (node = ++nodeIndex && node && node[dir2] || (diff = nodeIndex = 0) || start.pop()) {
                          if ((ofType ? node.nodeName.toLowerCase() === name : node.nodeType === 1) && ++diff) {
                            if (useCache) {
                              outerCache = node[expando] || (node[expando] = {});
                              uniqueCache = outerCache[node.uniqueID] || (outerCache[node.uniqueID] = {});
                              uniqueCache[type] = [dirruns, diff];
                            }
                            if (node === elem) {
                              break;
                            }
                          }
                        }
                      }
                    }
                    diff -= last;
                    return diff === first || diff % first === 0 && diff / first >= 0;
                  }
                };
              },
              "PSEUDO": function(pseudo, argument) {
                var args, fn = Expr.pseudos[pseudo] || Expr.setFilters[pseudo.toLowerCase()] || Sizzle2.error("unsupported pseudo: " + pseudo);
                if (fn[expando]) {
                  return fn(argument);
                }
                if (fn.length > 1) {
                  args = [pseudo, pseudo, "", argument];
                  return Expr.setFilters.hasOwnProperty(pseudo.toLowerCase()) ? markFunction(function(seed, matches2) {
                    var idx, matched = fn(seed, argument), i2 = matched.length;
                    while (i2--) {
                      idx = indexOf2(seed, matched[i2]);
                      seed[idx] = !(matches2[idx] = matched[i2]);
                    }
                  }) : function(elem) {
                    return fn(elem, 0, args);
                  };
                }
                return fn;
              }
            },
            pseudos: {
              "not": markFunction(function(selector) {
                var input = [], results = [], matcher = compile(selector.replace(rtrim2, "$1"));
                return matcher[expando] ? markFunction(function(seed, matches2, _context, xml) {
                  var elem, unmatched = matcher(seed, null, xml, []), i2 = seed.length;
                  while (i2--) {
                    if (elem = unmatched[i2]) {
                      seed[i2] = !(matches2[i2] = elem);
                    }
                  }
                }) : function(elem, _context, xml) {
                  input[0] = elem;
                  matcher(input, null, xml, results);
                  input[0] = null;
                  return !results.pop();
                };
              }),
              "has": markFunction(function(selector) {
                return function(elem) {
                  return Sizzle2(selector, elem).length > 0;
                };
              }),
              "contains": markFunction(function(text) {
                text = text.replace(runescape, funescape);
                return function(elem) {
                  return (elem.textContent || getText(elem)).indexOf(text) > -1;
                };
              }),
              "lang": markFunction(function(lang) {
                if (!ridentifier.test(lang || "")) {
                  Sizzle2.error("unsupported lang: " + lang);
                }
                lang = lang.replace(runescape, funescape).toLowerCase();
                return function(elem) {
                  var elemLang;
                  do {
                    if (elemLang = documentIsHTML ? elem.lang : elem.getAttribute("xml:lang") || elem.getAttribute("lang")) {
                      elemLang = elemLang.toLowerCase();
                      return elemLang === lang || elemLang.indexOf(lang + "-") === 0;
                    }
                  } while ((elem = elem.parentNode) && elem.nodeType === 1);
                  return false;
                };
              }),
              "target": function(elem) {
                var hash = window3.location && window3.location.hash;
                return hash && hash.slice(1) === elem.id;
              },
              "root": function(elem) {
                return elem === docElem;
              },
              "focus": function(elem) {
                return elem === document3.activeElement && (!document3.hasFocus || document3.hasFocus()) && !!(elem.type || elem.href || ~elem.tabIndex);
              },
              "enabled": createDisabledPseudo(false),
              "disabled": createDisabledPseudo(true),
              "checked": function(elem) {
                var nodeName2 = elem.nodeName.toLowerCase();
                return nodeName2 === "input" && !!elem.checked || nodeName2 === "option" && !!elem.selected;
              },
              "selected": function(elem) {
                if (elem.parentNode) {
                  elem.parentNode.selectedIndex;
                }
                return elem.selected === true;
              },
              "empty": function(elem) {
                for (elem = elem.firstChild; elem; elem = elem.nextSibling) {
                  if (elem.nodeType < 6) {
                    return false;
                  }
                }
                return true;
              },
              "parent": function(elem) {
                return !Expr.pseudos["empty"](elem);
              },
              "header": function(elem) {
                return rheader.test(elem.nodeName);
              },
              "input": function(elem) {
                return rinputs.test(elem.nodeName);
              },
              "button": function(elem) {
                var name = elem.nodeName.toLowerCase();
                return name === "input" && elem.type === "button" || name === "button";
              },
              "text": function(elem) {
                var attr;
                return elem.nodeName.toLowerCase() === "input" && elem.type === "text" && ((attr = elem.getAttribute("type")) == null || attr.toLowerCase() === "text");
              },
              "first": createPositionalPseudo(function() {
                return [0];
              }),
              "last": createPositionalPseudo(function(_matchIndexes, length) {
                return [length - 1];
              }),
              "eq": createPositionalPseudo(function(_matchIndexes, length, argument) {
                return [argument < 0 ? argument + length : argument];
              }),
              "even": createPositionalPseudo(function(matchIndexes, length) {
                var i2 = 0;
                for (; i2 < length; i2 += 2) {
                  matchIndexes.push(i2);
                }
                return matchIndexes;
              }),
              "odd": createPositionalPseudo(function(matchIndexes, length) {
                var i2 = 1;
                for (; i2 < length; i2 += 2) {
                  matchIndexes.push(i2);
                }
                return matchIndexes;
              }),
              "lt": createPositionalPseudo(function(matchIndexes, length, argument) {
                var i2 = argument < 0 ? argument + length : argument > length ? length : argument;
                for (; --i2 >= 0; ) {
                  matchIndexes.push(i2);
                }
                return matchIndexes;
              }),
              "gt": createPositionalPseudo(function(matchIndexes, length, argument) {
                var i2 = argument < 0 ? argument + length : argument;
                for (; ++i2 < length; ) {
                  matchIndexes.push(i2);
                }
                return matchIndexes;
              })
            }
          };
          Expr.pseudos["nth"] = Expr.pseudos["eq"];
          for (i in { radio: true, checkbox: true, file: true, password: true, image: true }) {
            Expr.pseudos[i] = createInputPseudo(i);
          }
          for (i in { submit: true, reset: true }) {
            Expr.pseudos[i] = createButtonPseudo(i);
          }
          function setFilters() {
          }
          setFilters.prototype = Expr.filters = Expr.pseudos;
          Expr.setFilters = new setFilters();
          tokenize = Sizzle2.tokenize = function(selector, parseOnly) {
            var matched, match, tokens, type, soFar, groups, preFilters, cached = tokenCache[selector + " "];
            if (cached) {
              return parseOnly ? 0 : cached.slice(0);
            }
            soFar = selector;
            groups = [];
            preFilters = Expr.preFilter;
            while (soFar) {
              if (!matched || (match = rcomma.exec(soFar))) {
                if (match) {
                  soFar = soFar.slice(match[0].length) || soFar;
                }
                groups.push(tokens = []);
              }
              matched = false;
              if (match = rcombinators.exec(soFar)) {
                matched = match.shift();
                tokens.push({
                  value: matched,
                  type: match[0].replace(rtrim2, " ")
                });
                soFar = soFar.slice(matched.length);
              }
              for (type in Expr.filter) {
                if ((match = matchExpr[type].exec(soFar)) && (!preFilters[type] || (match = preFilters[type](match)))) {
                  matched = match.shift();
                  tokens.push({
                    value: matched,
                    type,
                    matches: match
                  });
                  soFar = soFar.slice(matched.length);
                }
              }
              if (!matched) {
                break;
              }
            }
            return parseOnly ? soFar.length : soFar ? Sizzle2.error(selector) : tokenCache(selector, groups).slice(0);
          };
          function toSelector(tokens) {
            var i2 = 0, len = tokens.length, selector = "";
            for (; i2 < len; i2++) {
              selector += tokens[i2].value;
            }
            return selector;
          }
          function addCombinator(matcher, combinator, base) {
            var dir2 = combinator.dir, skip = combinator.next, key = skip || dir2, checkNonElements = base && key === "parentNode", doneName = done++;
            return combinator.first ? function(elem, context, xml) {
              while (elem = elem[dir2]) {
                if (elem.nodeType === 1 || checkNonElements) {
                  return matcher(elem, context, xml);
                }
              }
              return false;
            } : function(elem, context, xml) {
              var oldCache, uniqueCache, outerCache, newCache = [dirruns, doneName];
              if (xml) {
                while (elem = elem[dir2]) {
                  if (elem.nodeType === 1 || checkNonElements) {
                    if (matcher(elem, context, xml)) {
                      return true;
                    }
                  }
                }
              } else {
                while (elem = elem[dir2]) {
                  if (elem.nodeType === 1 || checkNonElements) {
                    outerCache = elem[expando] || (elem[expando] = {});
                    uniqueCache = outerCache[elem.uniqueID] || (outerCache[elem.uniqueID] = {});
                    if (skip && skip === elem.nodeName.toLowerCase()) {
                      elem = elem[dir2] || elem;
                    } else if ((oldCache = uniqueCache[key]) && oldCache[0] === dirruns && oldCache[1] === doneName) {
                      return newCache[2] = oldCache[2];
                    } else {
                      uniqueCache[key] = newCache;
                      if (newCache[2] = matcher(elem, context, xml)) {
                        return true;
                      }
                    }
                  }
                }
              }
              return false;
            };
          }
          function elementMatcher(matchers) {
            return matchers.length > 1 ? function(elem, context, xml) {
              var i2 = matchers.length;
              while (i2--) {
                if (!matchers[i2](elem, context, xml)) {
                  return false;
                }
              }
              return true;
            } : matchers[0];
          }
          function multipleContexts(selector, contexts, results) {
            var i2 = 0, len = contexts.length;
            for (; i2 < len; i2++) {
              Sizzle2(selector, contexts[i2], results);
            }
            return results;
          }
          function condense(unmatched, map, filter, context, xml) {
            var elem, newUnmatched = [], i2 = 0, len = unmatched.length, mapped = map != null;
            for (; i2 < len; i2++) {
              if (elem = unmatched[i2]) {
                if (!filter || filter(elem, context, xml)) {
                  newUnmatched.push(elem);
                  if (mapped) {
                    map.push(i2);
                  }
                }
              }
            }
            return newUnmatched;
          }
          function setMatcher(preFilter, selector, matcher, postFilter, postFinder, postSelector) {
            if (postFilter && !postFilter[expando]) {
              postFilter = setMatcher(postFilter);
            }
            if (postFinder && !postFinder[expando]) {
              postFinder = setMatcher(postFinder, postSelector);
            }
            return markFunction(function(seed, results, context, xml) {
              var temp, i2, elem, preMap = [], postMap = [], preexisting = results.length, elems = seed || multipleContexts(selector || "*", context.nodeType ? [context] : context, []), matcherIn = preFilter && (seed || !selector) ? condense(elems, preMap, preFilter, context, xml) : elems, matcherOut = matcher ? postFinder || (seed ? preFilter : preexisting || postFilter) ? [] : results : matcherIn;
              if (matcher) {
                matcher(matcherIn, matcherOut, context, xml);
              }
              if (postFilter) {
                temp = condense(matcherOut, postMap);
                postFilter(temp, [], context, xml);
                i2 = temp.length;
                while (i2--) {
                  if (elem = temp[i2]) {
                    matcherOut[postMap[i2]] = !(matcherIn[postMap[i2]] = elem);
                  }
                }
              }
              if (seed) {
                if (postFinder || preFilter) {
                  if (postFinder) {
                    temp = [];
                    i2 = matcherOut.length;
                    while (i2--) {
                      if (elem = matcherOut[i2]) {
                        temp.push(matcherIn[i2] = elem);
                      }
                    }
                    postFinder(null, matcherOut = [], temp, xml);
                  }
                  i2 = matcherOut.length;
                  while (i2--) {
                    if ((elem = matcherOut[i2]) && (temp = postFinder ? indexOf2(seed, elem) : preMap[i2]) > -1) {
                      seed[temp] = !(results[temp] = elem);
                    }
                  }
                }
              } else {
                matcherOut = condense(matcherOut === results ? matcherOut.splice(preexisting, matcherOut.length) : matcherOut);
                if (postFinder) {
                  postFinder(null, results, matcherOut, xml);
                } else {
                  push2.apply(results, matcherOut);
                }
              }
            });
          }
          function matcherFromTokens(tokens) {
            var checkContext, matcher, j, len = tokens.length, leadingRelative = Expr.relative[tokens[0].type], implicitRelative = leadingRelative || Expr.relative[" "], i2 = leadingRelative ? 1 : 0, matchContext = addCombinator(function(elem) {
              return elem === checkContext;
            }, implicitRelative, true), matchAnyContext = addCombinator(function(elem) {
              return indexOf2(checkContext, elem) > -1;
            }, implicitRelative, true), matchers = [function(elem, context, xml) {
              var ret = !leadingRelative && (xml || context !== outermostContext) || ((checkContext = context).nodeType ? matchContext(elem, context, xml) : matchAnyContext(elem, context, xml));
              checkContext = null;
              return ret;
            }];
            for (; i2 < len; i2++) {
              if (matcher = Expr.relative[tokens[i2].type]) {
                matchers = [addCombinator(elementMatcher(matchers), matcher)];
              } else {
                matcher = Expr.filter[tokens[i2].type].apply(null, tokens[i2].matches);
                if (matcher[expando]) {
                  j = ++i2;
                  for (; j < len; j++) {
                    if (Expr.relative[tokens[j].type]) {
                      break;
                    }
                  }
                  return setMatcher(i2 > 1 && elementMatcher(matchers), i2 > 1 && toSelector(tokens.slice(0, i2 - 1).concat({ value: tokens[i2 - 2].type === " " ? "*" : "" })).replace(rtrim2, "$1"), matcher, i2 < j && matcherFromTokens(tokens.slice(i2, j)), j < len && matcherFromTokens(tokens = tokens.slice(j)), j < len && toSelector(tokens));
                }
                matchers.push(matcher);
              }
            }
            return elementMatcher(matchers);
          }
          function matcherFromGroupMatchers(elementMatchers, setMatchers) {
            var bySet = setMatchers.length > 0, byElement = elementMatchers.length > 0, superMatcher = function(seed, context, xml, results, outermost) {
              var elem, j, matcher, matchedCount = 0, i2 = "0", unmatched = seed && [], setMatched = [], contextBackup = outermostContext, elems = seed || byElement && Expr.find["TAG"]("*", outermost), dirrunsUnique = dirruns += contextBackup == null ? 1 : Math.random() || 0.1, len = elems.length;
              if (outermost) {
                outermostContext = context == document3 || context || outermost;
              }
              for (; i2 !== len && (elem = elems[i2]) != null; i2++) {
                if (byElement && elem) {
                  j = 0;
                  if (!context && elem.ownerDocument != document3) {
                    setDocument(elem);
                    xml = !documentIsHTML;
                  }
                  while (matcher = elementMatchers[j++]) {
                    if (matcher(elem, context || document3, xml)) {
                      results.push(elem);
                      break;
                    }
                  }
                  if (outermost) {
                    dirruns = dirrunsUnique;
                  }
                }
                if (bySet) {
                  if (elem = !matcher && elem) {
                    matchedCount--;
                  }
                  if (seed) {
                    unmatched.push(elem);
                  }
                }
              }
              matchedCount += i2;
              if (bySet && i2 !== matchedCount) {
                j = 0;
                while (matcher = setMatchers[j++]) {
                  matcher(unmatched, setMatched, context, xml);
                }
                if (seed) {
                  if (matchedCount > 0) {
                    while (i2--) {
                      if (!(unmatched[i2] || setMatched[i2])) {
                        setMatched[i2] = pop.call(results);
                      }
                    }
                  }
                  setMatched = condense(setMatched);
                }
                push2.apply(results, setMatched);
                if (outermost && !seed && setMatched.length > 0 && matchedCount + setMatchers.length > 1) {
                  Sizzle2.uniqueSort(results);
                }
              }
              if (outermost) {
                dirruns = dirrunsUnique;
                outermostContext = contextBackup;
              }
              return unmatched;
            };
            return bySet ? markFunction(superMatcher) : superMatcher;
          }
          compile = Sizzle2.compile = function(selector, match) {
            var i2, setMatchers = [], elementMatchers = [], cached = compilerCache[selector + " "];
            if (!cached) {
              if (!match) {
                match = tokenize(selector);
              }
              i2 = match.length;
              while (i2--) {
                cached = matcherFromTokens(match[i2]);
                if (cached[expando]) {
                  setMatchers.push(cached);
                } else {
                  elementMatchers.push(cached);
                }
              }
              cached = compilerCache(selector, matcherFromGroupMatchers(elementMatchers, setMatchers));
              cached.selector = selector;
            }
            return cached;
          };
          select = Sizzle2.select = function(selector, context, results, seed) {
            var i2, tokens, token, type, find, compiled = typeof selector === "function" && selector, match = !seed && tokenize(selector = compiled.selector || selector);
            results = results || [];
            if (match.length === 1) {
              tokens = match[0] = match[0].slice(0);
              if (tokens.length > 2 && (token = tokens[0]).type === "ID" && context.nodeType === 9 && documentIsHTML && Expr.relative[tokens[1].type]) {
                context = (Expr.find["ID"](token.matches[0].replace(runescape, funescape), context) || [])[0];
                if (!context) {
                  return results;
                } else if (compiled) {
                  context = context.parentNode;
                }
                selector = selector.slice(tokens.shift().value.length);
              }
              i2 = matchExpr["needsContext"].test(selector) ? 0 : tokens.length;
              while (i2--) {
                token = tokens[i2];
                if (Expr.relative[type = token.type]) {
                  break;
                }
                if (find = Expr.find[type]) {
                  if (seed = find(token.matches[0].replace(runescape, funescape), rsibling.test(tokens[0].type) && testContext(context.parentNode) || context)) {
                    tokens.splice(i2, 1);
                    selector = seed.length && toSelector(tokens);
                    if (!selector) {
                      push2.apply(results, seed);
                      return results;
                    }
                    break;
                  }
                }
              }
            }
            (compiled || compile(selector, match))(seed, context, !documentIsHTML, results, !context || rsibling.test(selector) && testContext(context.parentNode) || context);
            return results;
          };
          support2.sortStable = expando.split("").sort(sortOrder).join("") === expando;
          support2.detectDuplicates = !!hasDuplicate;
          setDocument();
          support2.sortDetached = assert(function(el) {
            return el.compareDocumentPosition(document3.createElement("fieldset")) & 1;
          });
          if (!assert(function(el) {
            el.innerHTML = "<a href='#'></a>";
            return el.firstChild.getAttribute("href") === "#";
          })) {
            addHandle("type|href|height|width", function(elem, name, isXML2) {
              if (!isXML2) {
                return elem.getAttribute(name, name.toLowerCase() === "type" ? 1 : 2);
              }
            });
          }
          if (!support2.attributes || !assert(function(el) {
            el.innerHTML = "<input/>";
            el.firstChild.setAttribute("value", "");
            return el.firstChild.getAttribute("value") === "";
          })) {
            addHandle("value", function(elem, _name, isXML2) {
              if (!isXML2 && elem.nodeName.toLowerCase() === "input") {
                return elem.defaultValue;
              }
            });
          }
          if (!assert(function(el) {
            return el.getAttribute("disabled") == null;
          })) {
            addHandle(booleans, function(elem, name, isXML2) {
              var val;
              if (!isXML2) {
                return elem[name] === true ? name.toLowerCase() : (val = elem.getAttributeNode(name)) && val.specified ? val.value : null;
              }
            });
          }
          return Sizzle2;
        }(window2);
        jQuery2.find = Sizzle;
        jQuery2.expr = Sizzle.selectors;
        jQuery2.expr[":"] = jQuery2.expr.pseudos;
        jQuery2.uniqueSort = jQuery2.unique = Sizzle.uniqueSort;
        jQuery2.text = Sizzle.getText;
        jQuery2.isXMLDoc = Sizzle.isXML;
        jQuery2.contains = Sizzle.contains;
        jQuery2.escapeSelector = Sizzle.escape;
        var dir = function(elem, dir2, until) {
          var matched = [], truncate = until !== void 0;
          while ((elem = elem[dir2]) && elem.nodeType !== 9) {
            if (elem.nodeType === 1) {
              if (truncate && jQuery2(elem).is(until)) {
                break;
              }
              matched.push(elem);
            }
          }
          return matched;
        };
        var siblings = function(n, elem) {
          var matched = [];
          for (; n; n = n.nextSibling) {
            if (n.nodeType === 1 && n !== elem) {
              matched.push(n);
            }
          }
          return matched;
        };
        var rneedsContext = jQuery2.expr.match.needsContext;
        function nodeName(elem, name) {
          return elem.nodeName && elem.nodeName.toLowerCase() === name.toLowerCase();
        }
        var rsingleTag = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
        function winnow(elements, qualifier, not) {
          if (isFunction(qualifier)) {
            return jQuery2.grep(elements, function(elem, i) {
              return !!qualifier.call(elem, i, elem) !== not;
            });
          }
          if (qualifier.nodeType) {
            return jQuery2.grep(elements, function(elem) {
              return elem === qualifier !== not;
            });
          }
          if (typeof qualifier !== "string") {
            return jQuery2.grep(elements, function(elem) {
              return indexOf.call(qualifier, elem) > -1 !== not;
            });
          }
          return jQuery2.filter(qualifier, elements, not);
        }
        jQuery2.filter = function(expr, elems, not) {
          var elem = elems[0];
          if (not) {
            expr = ":not(" + expr + ")";
          }
          if (elems.length === 1 && elem.nodeType === 1) {
            return jQuery2.find.matchesSelector(elem, expr) ? [elem] : [];
          }
          return jQuery2.find.matches(expr, jQuery2.grep(elems, function(elem2) {
            return elem2.nodeType === 1;
          }));
        };
        jQuery2.fn.extend({
          find: function(selector) {
            var i, ret, len = this.length, self2 = this;
            if (typeof selector !== "string") {
              return this.pushStack(jQuery2(selector).filter(function() {
                for (i = 0; i < len; i++) {
                  if (jQuery2.contains(self2[i], this)) {
                    return true;
                  }
                }
              }));
            }
            ret = this.pushStack([]);
            for (i = 0; i < len; i++) {
              jQuery2.find(selector, self2[i], ret);
            }
            return len > 1 ? jQuery2.uniqueSort(ret) : ret;
          },
          filter: function(selector) {
            return this.pushStack(winnow(this, selector || [], false));
          },
          not: function(selector) {
            return this.pushStack(winnow(this, selector || [], true));
          },
          is: function(selector) {
            return !!winnow(this, typeof selector === "string" && rneedsContext.test(selector) ? jQuery2(selector) : selector || [], false).length;
          }
        });
        var rootjQuery, rquickExpr = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/, init = jQuery2.fn.init = function(selector, context, root) {
          var match, elem;
          if (!selector) {
            return this;
          }
          root = root || rootjQuery;
          if (typeof selector === "string") {
            if (selector[0] === "<" && selector[selector.length - 1] === ">" && selector.length >= 3) {
              match = [null, selector, null];
            } else {
              match = rquickExpr.exec(selector);
            }
            if (match && (match[1] || !context)) {
              if (match[1]) {
                context = context instanceof jQuery2 ? context[0] : context;
                jQuery2.merge(this, jQuery2.parseHTML(match[1], context && context.nodeType ? context.ownerDocument || context : document2, true));
                if (rsingleTag.test(match[1]) && jQuery2.isPlainObject(context)) {
                  for (match in context) {
                    if (isFunction(this[match])) {
                      this[match](context[match]);
                    } else {
                      this.attr(match, context[match]);
                    }
                  }
                }
                return this;
              } else {
                elem = document2.getElementById(match[2]);
                if (elem) {
                  this[0] = elem;
                  this.length = 1;
                }
                return this;
              }
            } else if (!context || context.jquery) {
              return (context || root).find(selector);
            } else {
              return this.constructor(context).find(selector);
            }
          } else if (selector.nodeType) {
            this[0] = selector;
            this.length = 1;
            return this;
          } else if (isFunction(selector)) {
            return root.ready !== void 0 ? root.ready(selector) : selector(jQuery2);
          }
          return jQuery2.makeArray(selector, this);
        };
        init.prototype = jQuery2.fn;
        rootjQuery = jQuery2(document2);
        var rparentsprev = /^(?:parents|prev(?:Until|All))/, guaranteedUnique = {
          children: true,
          contents: true,
          next: true,
          prev: true
        };
        jQuery2.fn.extend({
          has: function(target) {
            var targets = jQuery2(target, this), l = targets.length;
            return this.filter(function() {
              var i = 0;
              for (; i < l; i++) {
                if (jQuery2.contains(this, targets[i])) {
                  return true;
                }
              }
            });
          },
          closest: function(selectors, context) {
            var cur, i = 0, l = this.length, matched = [], targets = typeof selectors !== "string" && jQuery2(selectors);
            if (!rneedsContext.test(selectors)) {
              for (; i < l; i++) {
                for (cur = this[i]; cur && cur !== context; cur = cur.parentNode) {
                  if (cur.nodeType < 11 && (targets ? targets.index(cur) > -1 : cur.nodeType === 1 && jQuery2.find.matchesSelector(cur, selectors))) {
                    matched.push(cur);
                    break;
                  }
                }
              }
            }
            return this.pushStack(matched.length > 1 ? jQuery2.uniqueSort(matched) : matched);
          },
          index: function(elem) {
            if (!elem) {
              return this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
            }
            if (typeof elem === "string") {
              return indexOf.call(jQuery2(elem), this[0]);
            }
            return indexOf.call(this, elem.jquery ? elem[0] : elem);
          },
          add: function(selector, context) {
            return this.pushStack(jQuery2.uniqueSort(jQuery2.merge(this.get(), jQuery2(selector, context))));
          },
          addBack: function(selector) {
            return this.add(selector == null ? this.prevObject : this.prevObject.filter(selector));
          }
        });
        function sibling(cur, dir2) {
          while ((cur = cur[dir2]) && cur.nodeType !== 1) {
          }
          return cur;
        }
        jQuery2.each({
          parent: function(elem) {
            var parent = elem.parentNode;
            return parent && parent.nodeType !== 11 ? parent : null;
          },
          parents: function(elem) {
            return dir(elem, "parentNode");
          },
          parentsUntil: function(elem, _i, until) {
            return dir(elem, "parentNode", until);
          },
          next: function(elem) {
            return sibling(elem, "nextSibling");
          },
          prev: function(elem) {
            return sibling(elem, "previousSibling");
          },
          nextAll: function(elem) {
            return dir(elem, "nextSibling");
          },
          prevAll: function(elem) {
            return dir(elem, "previousSibling");
          },
          nextUntil: function(elem, _i, until) {
            return dir(elem, "nextSibling", until);
          },
          prevUntil: function(elem, _i, until) {
            return dir(elem, "previousSibling", until);
          },
          siblings: function(elem) {
            return siblings((elem.parentNode || {}).firstChild, elem);
          },
          children: function(elem) {
            return siblings(elem.firstChild);
          },
          contents: function(elem) {
            if (elem.contentDocument != null && getProto(elem.contentDocument)) {
              return elem.contentDocument;
            }
            if (nodeName(elem, "template")) {
              elem = elem.content || elem;
            }
            return jQuery2.merge([], elem.childNodes);
          }
        }, function(name, fn) {
          jQuery2.fn[name] = function(until, selector) {
            var matched = jQuery2.map(this, fn, until);
            if (name.slice(-5) !== "Until") {
              selector = until;
            }
            if (selector && typeof selector === "string") {
              matched = jQuery2.filter(selector, matched);
            }
            if (this.length > 1) {
              if (!guaranteedUnique[name]) {
                jQuery2.uniqueSort(matched);
              }
              if (rparentsprev.test(name)) {
                matched.reverse();
              }
            }
            return this.pushStack(matched);
          };
        });
        var rnothtmlwhite = /[^\x20\t\r\n\f]+/g;
        function createOptions(options) {
          var object = {};
          jQuery2.each(options.match(rnothtmlwhite) || [], function(_, flag) {
            object[flag] = true;
          });
          return object;
        }
        jQuery2.Callbacks = function(options) {
          options = typeof options === "string" ? createOptions(options) : jQuery2.extend({}, options);
          var firing, memory, fired, locked, list = [], queue = [], firingIndex = -1, fire = function() {
            locked = locked || options.once;
            fired = firing = true;
            for (; queue.length; firingIndex = -1) {
              memory = queue.shift();
              while (++firingIndex < list.length) {
                if (list[firingIndex].apply(memory[0], memory[1]) === false && options.stopOnFalse) {
                  firingIndex = list.length;
                  memory = false;
                }
              }
            }
            if (!options.memory) {
              memory = false;
            }
            firing = false;
            if (locked) {
              if (memory) {
                list = [];
              } else {
                list = "";
              }
            }
          }, self2 = {
            add: function() {
              if (list) {
                if (memory && !firing) {
                  firingIndex = list.length - 1;
                  queue.push(memory);
                }
                (function add(args) {
                  jQuery2.each(args, function(_, arg) {
                    if (isFunction(arg)) {
                      if (!options.unique || !self2.has(arg)) {
                        list.push(arg);
                      }
                    } else if (arg && arg.length && toType(arg) !== "string") {
                      add(arg);
                    }
                  });
                })(arguments);
                if (memory && !firing) {
                  fire();
                }
              }
              return this;
            },
            remove: function() {
              jQuery2.each(arguments, function(_, arg) {
                var index;
                while ((index = jQuery2.inArray(arg, list, index)) > -1) {
                  list.splice(index, 1);
                  if (index <= firingIndex) {
                    firingIndex--;
                  }
                }
              });
              return this;
            },
            has: function(fn) {
              return fn ? jQuery2.inArray(fn, list) > -1 : list.length > 0;
            },
            empty: function() {
              if (list) {
                list = [];
              }
              return this;
            },
            disable: function() {
              locked = queue = [];
              list = memory = "";
              return this;
            },
            disabled: function() {
              return !list;
            },
            lock: function() {
              locked = queue = [];
              if (!memory && !firing) {
                list = memory = "";
              }
              return this;
            },
            locked: function() {
              return !!locked;
            },
            fireWith: function(context, args) {
              if (!locked) {
                args = args || [];
                args = [context, args.slice ? args.slice() : args];
                queue.push(args);
                if (!firing) {
                  fire();
                }
              }
              return this;
            },
            fire: function() {
              self2.fireWith(this, arguments);
              return this;
            },
            fired: function() {
              return !!fired;
            }
          };
          return self2;
        };
        function Identity(v) {
          return v;
        }
        function Thrower(ex) {
          throw ex;
        }
        function adoptValue(value, resolve, reject, noValue) {
          var method;
          try {
            if (value && isFunction(method = value.promise)) {
              method.call(value).done(resolve).fail(reject);
            } else if (value && isFunction(method = value.then)) {
              method.call(value, resolve, reject);
            } else {
              resolve.apply(void 0, [value].slice(noValue));
            }
          } catch (value2) {
            reject.apply(void 0, [value2]);
          }
        }
        jQuery2.extend({
          Deferred: function(func) {
            var tuples = [
              [
                "notify",
                "progress",
                jQuery2.Callbacks("memory"),
                jQuery2.Callbacks("memory"),
                2
              ],
              [
                "resolve",
                "done",
                jQuery2.Callbacks("once memory"),
                jQuery2.Callbacks("once memory"),
                0,
                "resolved"
              ],
              [
                "reject",
                "fail",
                jQuery2.Callbacks("once memory"),
                jQuery2.Callbacks("once memory"),
                1,
                "rejected"
              ]
            ], state = "pending", promise = {
              state: function() {
                return state;
              },
              always: function() {
                deferred.done(arguments).fail(arguments);
                return this;
              },
              "catch": function(fn) {
                return promise.then(null, fn);
              },
              pipe: function() {
                var fns = arguments;
                return jQuery2.Deferred(function(newDefer) {
                  jQuery2.each(tuples, function(_i, tuple) {
                    var fn = isFunction(fns[tuple[4]]) && fns[tuple[4]];
                    deferred[tuple[1]](function() {
                      var returned = fn && fn.apply(this, arguments);
                      if (returned && isFunction(returned.promise)) {
                        returned.promise().progress(newDefer.notify).done(newDefer.resolve).fail(newDefer.reject);
                      } else {
                        newDefer[tuple[0] + "With"](this, fn ? [returned] : arguments);
                      }
                    });
                  });
                  fns = null;
                }).promise();
              },
              then: function(onFulfilled, onRejected, onProgress) {
                var maxDepth = 0;
                function resolve(depth, deferred2, handler, special) {
                  return function() {
                    var that = this, args = arguments, mightThrow = function() {
                      var returned, then;
                      if (depth < maxDepth) {
                        return;
                      }
                      returned = handler.apply(that, args);
                      if (returned === deferred2.promise()) {
                        throw new TypeError("Thenable self-resolution");
                      }
                      then = returned && (typeof returned === "object" || typeof returned === "function") && returned.then;
                      if (isFunction(then)) {
                        if (special) {
                          then.call(returned, resolve(maxDepth, deferred2, Identity, special), resolve(maxDepth, deferred2, Thrower, special));
                        } else {
                          maxDepth++;
                          then.call(returned, resolve(maxDepth, deferred2, Identity, special), resolve(maxDepth, deferred2, Thrower, special), resolve(maxDepth, deferred2, Identity, deferred2.notifyWith));
                        }
                      } else {
                        if (handler !== Identity) {
                          that = void 0;
                          args = [returned];
                        }
                        (special || deferred2.resolveWith)(that, args);
                      }
                    }, process = special ? mightThrow : function() {
                      try {
                        mightThrow();
                      } catch (e) {
                        if (jQuery2.Deferred.exceptionHook) {
                          jQuery2.Deferred.exceptionHook(e, process.stackTrace);
                        }
                        if (depth + 1 >= maxDepth) {
                          if (handler !== Thrower) {
                            that = void 0;
                            args = [e];
                          }
                          deferred2.rejectWith(that, args);
                        }
                      }
                    };
                    if (depth) {
                      process();
                    } else {
                      if (jQuery2.Deferred.getStackHook) {
                        process.stackTrace = jQuery2.Deferred.getStackHook();
                      }
                      window2.setTimeout(process);
                    }
                  };
                }
                return jQuery2.Deferred(function(newDefer) {
                  tuples[0][3].add(resolve(0, newDefer, isFunction(onProgress) ? onProgress : Identity, newDefer.notifyWith));
                  tuples[1][3].add(resolve(0, newDefer, isFunction(onFulfilled) ? onFulfilled : Identity));
                  tuples[2][3].add(resolve(0, newDefer, isFunction(onRejected) ? onRejected : Thrower));
                }).promise();
              },
              promise: function(obj) {
                return obj != null ? jQuery2.extend(obj, promise) : promise;
              }
            }, deferred = {};
            jQuery2.each(tuples, function(i, tuple) {
              var list = tuple[2], stateString = tuple[5];
              promise[tuple[1]] = list.add;
              if (stateString) {
                list.add(function() {
                  state = stateString;
                }, tuples[3 - i][2].disable, tuples[3 - i][3].disable, tuples[0][2].lock, tuples[0][3].lock);
              }
              list.add(tuple[3].fire);
              deferred[tuple[0]] = function() {
                deferred[tuple[0] + "With"](this === deferred ? void 0 : this, arguments);
                return this;
              };
              deferred[tuple[0] + "With"] = list.fireWith;
            });
            promise.promise(deferred);
            if (func) {
              func.call(deferred, deferred);
            }
            return deferred;
          },
          when: function(singleValue) {
            var remaining = arguments.length, i = remaining, resolveContexts = Array(i), resolveValues = slice.call(arguments), primary = jQuery2.Deferred(), updateFunc = function(i2) {
              return function(value) {
                resolveContexts[i2] = this;
                resolveValues[i2] = arguments.length > 1 ? slice.call(arguments) : value;
                if (!--remaining) {
                  primary.resolveWith(resolveContexts, resolveValues);
                }
              };
            };
            if (remaining <= 1) {
              adoptValue(singleValue, primary.done(updateFunc(i)).resolve, primary.reject, !remaining);
              if (primary.state() === "pending" || isFunction(resolveValues[i] && resolveValues[i].then)) {
                return primary.then();
              }
            }
            while (i--) {
              adoptValue(resolveValues[i], updateFunc(i), primary.reject);
            }
            return primary.promise();
          }
        });
        var rerrorNames = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
        jQuery2.Deferred.exceptionHook = function(error, stack) {
          if (window2.console && window2.console.warn && error && rerrorNames.test(error.name)) {
            window2.console.warn("jQuery.Deferred exception: " + error.message, error.stack, stack);
          }
        };
        jQuery2.readyException = function(error) {
          window2.setTimeout(function() {
            throw error;
          });
        };
        var readyList = jQuery2.Deferred();
        jQuery2.fn.ready = function(fn) {
          readyList.then(fn).catch(function(error) {
            jQuery2.readyException(error);
          });
          return this;
        };
        jQuery2.extend({
          isReady: false,
          readyWait: 1,
          ready: function(wait) {
            if (wait === true ? --jQuery2.readyWait : jQuery2.isReady) {
              return;
            }
            jQuery2.isReady = true;
            if (wait !== true && --jQuery2.readyWait > 0) {
              return;
            }
            readyList.resolveWith(document2, [jQuery2]);
          }
        });
        jQuery2.ready.then = readyList.then;
        function completed() {
          document2.removeEventListener("DOMContentLoaded", completed);
          window2.removeEventListener("load", completed);
          jQuery2.ready();
        }
        if (document2.readyState === "complete" || document2.readyState !== "loading" && !document2.documentElement.doScroll) {
          window2.setTimeout(jQuery2.ready);
        } else {
          document2.addEventListener("DOMContentLoaded", completed);
          window2.addEventListener("load", completed);
        }
        var access = function(elems, fn, key, value, chainable, emptyGet, raw) {
          var i = 0, len = elems.length, bulk = key == null;
          if (toType(key) === "object") {
            chainable = true;
            for (i in key) {
              access(elems, fn, i, key[i], true, emptyGet, raw);
            }
          } else if (value !== void 0) {
            chainable = true;
            if (!isFunction(value)) {
              raw = true;
            }
            if (bulk) {
              if (raw) {
                fn.call(elems, value);
                fn = null;
              } else {
                bulk = fn;
                fn = function(elem, _key, value2) {
                  return bulk.call(jQuery2(elem), value2);
                };
              }
            }
            if (fn) {
              for (; i < len; i++) {
                fn(elems[i], key, raw ? value : value.call(elems[i], i, fn(elems[i], key)));
              }
            }
          }
          if (chainable) {
            return elems;
          }
          if (bulk) {
            return fn.call(elems);
          }
          return len ? fn(elems[0], key) : emptyGet;
        };
        var rmsPrefix = /^-ms-/, rdashAlpha = /-([a-z])/g;
        function fcamelCase(_all, letter) {
          return letter.toUpperCase();
        }
        function camelCase(string) {
          return string.replace(rmsPrefix, "ms-").replace(rdashAlpha, fcamelCase);
        }
        var acceptData = function(owner) {
          return owner.nodeType === 1 || owner.nodeType === 9 || !+owner.nodeType;
        };
        function Data() {
          this.expando = jQuery2.expando + Data.uid++;
        }
        Data.uid = 1;
        Data.prototype = {
          cache: function(owner) {
            var value = owner[this.expando];
            if (!value) {
              value = {};
              if (acceptData(owner)) {
                if (owner.nodeType) {
                  owner[this.expando] = value;
                } else {
                  Object.defineProperty(owner, this.expando, {
                    value,
                    configurable: true
                  });
                }
              }
            }
            return value;
          },
          set: function(owner, data, value) {
            var prop, cache = this.cache(owner);
            if (typeof data === "string") {
              cache[camelCase(data)] = value;
            } else {
              for (prop in data) {
                cache[camelCase(prop)] = data[prop];
              }
            }
            return cache;
          },
          get: function(owner, key) {
            return key === void 0 ? this.cache(owner) : owner[this.expando] && owner[this.expando][camelCase(key)];
          },
          access: function(owner, key, value) {
            if (key === void 0 || key && typeof key === "string" && value === void 0) {
              return this.get(owner, key);
            }
            this.set(owner, key, value);
            return value !== void 0 ? value : key;
          },
          remove: function(owner, key) {
            var i, cache = owner[this.expando];
            if (cache === void 0) {
              return;
            }
            if (key !== void 0) {
              if (Array.isArray(key)) {
                key = key.map(camelCase);
              } else {
                key = camelCase(key);
                key = key in cache ? [key] : key.match(rnothtmlwhite) || [];
              }
              i = key.length;
              while (i--) {
                delete cache[key[i]];
              }
            }
            if (key === void 0 || jQuery2.isEmptyObject(cache)) {
              if (owner.nodeType) {
                owner[this.expando] = void 0;
              } else {
                delete owner[this.expando];
              }
            }
          },
          hasData: function(owner) {
            var cache = owner[this.expando];
            return cache !== void 0 && !jQuery2.isEmptyObject(cache);
          }
        };
        var dataPriv = new Data();
        var dataUser = new Data();
        var rbrace = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, rmultiDash = /[A-Z]/g;
        function getData(data) {
          if (data === "true") {
            return true;
          }
          if (data === "false") {
            return false;
          }
          if (data === "null") {
            return null;
          }
          if (data === +data + "") {
            return +data;
          }
          if (rbrace.test(data)) {
            return JSON.parse(data);
          }
          return data;
        }
        function dataAttr(elem, key, data) {
          var name;
          if (data === void 0 && elem.nodeType === 1) {
            name = "data-" + key.replace(rmultiDash, "-$&").toLowerCase();
            data = elem.getAttribute(name);
            if (typeof data === "string") {
              try {
                data = getData(data);
              } catch (e) {
              }
              dataUser.set(elem, key, data);
            } else {
              data = void 0;
            }
          }
          return data;
        }
        jQuery2.extend({
          hasData: function(elem) {
            return dataUser.hasData(elem) || dataPriv.hasData(elem);
          },
          data: function(elem, name, data) {
            return dataUser.access(elem, name, data);
          },
          removeData: function(elem, name) {
            dataUser.remove(elem, name);
          },
          _data: function(elem, name, data) {
            return dataPriv.access(elem, name, data);
          },
          _removeData: function(elem, name) {
            dataPriv.remove(elem, name);
          }
        });
        jQuery2.fn.extend({
          data: function(key, value) {
            var i, name, data, elem = this[0], attrs = elem && elem.attributes;
            if (key === void 0) {
              if (this.length) {
                data = dataUser.get(elem);
                if (elem.nodeType === 1 && !dataPriv.get(elem, "hasDataAttrs")) {
                  i = attrs.length;
                  while (i--) {
                    if (attrs[i]) {
                      name = attrs[i].name;
                      if (name.indexOf("data-") === 0) {
                        name = camelCase(name.slice(5));
                        dataAttr(elem, name, data[name]);
                      }
                    }
                  }
                  dataPriv.set(elem, "hasDataAttrs", true);
                }
              }
              return data;
            }
            if (typeof key === "object") {
              return this.each(function() {
                dataUser.set(this, key);
              });
            }
            return access(this, function(value2) {
              var data2;
              if (elem && value2 === void 0) {
                data2 = dataUser.get(elem, key);
                if (data2 !== void 0) {
                  return data2;
                }
                data2 = dataAttr(elem, key);
                if (data2 !== void 0) {
                  return data2;
                }
                return;
              }
              this.each(function() {
                dataUser.set(this, key, value2);
              });
            }, null, value, arguments.length > 1, null, true);
          },
          removeData: function(key) {
            return this.each(function() {
              dataUser.remove(this, key);
            });
          }
        });
        jQuery2.extend({
          queue: function(elem, type, data) {
            var queue;
            if (elem) {
              type = (type || "fx") + "queue";
              queue = dataPriv.get(elem, type);
              if (data) {
                if (!queue || Array.isArray(data)) {
                  queue = dataPriv.access(elem, type, jQuery2.makeArray(data));
                } else {
                  queue.push(data);
                }
              }
              return queue || [];
            }
          },
          dequeue: function(elem, type) {
            type = type || "fx";
            var queue = jQuery2.queue(elem, type), startLength = queue.length, fn = queue.shift(), hooks = jQuery2._queueHooks(elem, type), next = function() {
              jQuery2.dequeue(elem, type);
            };
            if (fn === "inprogress") {
              fn = queue.shift();
              startLength--;
            }
            if (fn) {
              if (type === "fx") {
                queue.unshift("inprogress");
              }
              delete hooks.stop;
              fn.call(elem, next, hooks);
            }
            if (!startLength && hooks) {
              hooks.empty.fire();
            }
          },
          _queueHooks: function(elem, type) {
            var key = type + "queueHooks";
            return dataPriv.get(elem, key) || dataPriv.access(elem, key, {
              empty: jQuery2.Callbacks("once memory").add(function() {
                dataPriv.remove(elem, [type + "queue", key]);
              })
            });
          }
        });
        jQuery2.fn.extend({
          queue: function(type, data) {
            var setter = 2;
            if (typeof type !== "string") {
              data = type;
              type = "fx";
              setter--;
            }
            if (arguments.length < setter) {
              return jQuery2.queue(this[0], type);
            }
            return data === void 0 ? this : this.each(function() {
              var queue = jQuery2.queue(this, type, data);
              jQuery2._queueHooks(this, type);
              if (type === "fx" && queue[0] !== "inprogress") {
                jQuery2.dequeue(this, type);
              }
            });
          },
          dequeue: function(type) {
            return this.each(function() {
              jQuery2.dequeue(this, type);
            });
          },
          clearQueue: function(type) {
            return this.queue(type || "fx", []);
          },
          promise: function(type, obj) {
            var tmp, count = 1, defer = jQuery2.Deferred(), elements = this, i = this.length, resolve = function() {
              if (!--count) {
                defer.resolveWith(elements, [elements]);
              }
            };
            if (typeof type !== "string") {
              obj = type;
              type = void 0;
            }
            type = type || "fx";
            while (i--) {
              tmp = dataPriv.get(elements[i], type + "queueHooks");
              if (tmp && tmp.empty) {
                count++;
                tmp.empty.add(resolve);
              }
            }
            resolve();
            return defer.promise(obj);
          }
        });
        var pnum = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source;
        var rcssNum = new RegExp("^(?:([+-])=|)(" + pnum + ")([a-z%]*)$", "i");
        var cssExpand = ["Top", "Right", "Bottom", "Left"];
        var documentElement = document2.documentElement;
        var isAttached = function(elem) {
          return jQuery2.contains(elem.ownerDocument, elem);
        }, composed = { composed: true };
        if (documentElement.getRootNode) {
          isAttached = function(elem) {
            return jQuery2.contains(elem.ownerDocument, elem) || elem.getRootNode(composed) === elem.ownerDocument;
          };
        }
        var isHiddenWithinTree = function(elem, el) {
          elem = el || elem;
          return elem.style.display === "none" || elem.style.display === "" && isAttached(elem) && jQuery2.css(elem, "display") === "none";
        };
        function adjustCSS(elem, prop, valueParts, tween) {
          var adjusted, scale, maxIterations = 20, currentValue = tween ? function() {
            return tween.cur();
          } : function() {
            return jQuery2.css(elem, prop, "");
          }, initial = currentValue(), unit = valueParts && valueParts[3] || (jQuery2.cssNumber[prop] ? "" : "px"), initialInUnit = elem.nodeType && (jQuery2.cssNumber[prop] || unit !== "px" && +initial) && rcssNum.exec(jQuery2.css(elem, prop));
          if (initialInUnit && initialInUnit[3] !== unit) {
            initial = initial / 2;
            unit = unit || initialInUnit[3];
            initialInUnit = +initial || 1;
            while (maxIterations--) {
              jQuery2.style(elem, prop, initialInUnit + unit);
              if ((1 - scale) * (1 - (scale = currentValue() / initial || 0.5)) <= 0) {
                maxIterations = 0;
              }
              initialInUnit = initialInUnit / scale;
            }
            initialInUnit = initialInUnit * 2;
            jQuery2.style(elem, prop, initialInUnit + unit);
            valueParts = valueParts || [];
          }
          if (valueParts) {
            initialInUnit = +initialInUnit || +initial || 0;
            adjusted = valueParts[1] ? initialInUnit + (valueParts[1] + 1) * valueParts[2] : +valueParts[2];
            if (tween) {
              tween.unit = unit;
              tween.start = initialInUnit;
              tween.end = adjusted;
            }
          }
          return adjusted;
        }
        var defaultDisplayMap = {};
        function getDefaultDisplay(elem) {
          var temp, doc = elem.ownerDocument, nodeName2 = elem.nodeName, display = defaultDisplayMap[nodeName2];
          if (display) {
            return display;
          }
          temp = doc.body.appendChild(doc.createElement(nodeName2));
          display = jQuery2.css(temp, "display");
          temp.parentNode.removeChild(temp);
          if (display === "none") {
            display = "block";
          }
          defaultDisplayMap[nodeName2] = display;
          return display;
        }
        function showHide(elements, show) {
          var display, elem, values = [], index = 0, length = elements.length;
          for (; index < length; index++) {
            elem = elements[index];
            if (!elem.style) {
              continue;
            }
            display = elem.style.display;
            if (show) {
              if (display === "none") {
                values[index] = dataPriv.get(elem, "display") || null;
                if (!values[index]) {
                  elem.style.display = "";
                }
              }
              if (elem.style.display === "" && isHiddenWithinTree(elem)) {
                values[index] = getDefaultDisplay(elem);
              }
            } else {
              if (display !== "none") {
                values[index] = "none";
                dataPriv.set(elem, "display", display);
              }
            }
          }
          for (index = 0; index < length; index++) {
            if (values[index] != null) {
              elements[index].style.display = values[index];
            }
          }
          return elements;
        }
        jQuery2.fn.extend({
          show: function() {
            return showHide(this, true);
          },
          hide: function() {
            return showHide(this);
          },
          toggle: function(state) {
            if (typeof state === "boolean") {
              return state ? this.show() : this.hide();
            }
            return this.each(function() {
              if (isHiddenWithinTree(this)) {
                jQuery2(this).show();
              } else {
                jQuery2(this).hide();
              }
            });
          }
        });
        var rcheckableType = /^(?:checkbox|radio)$/i;
        var rtagName = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i;
        var rscriptType = /^$|^module$|\/(?:java|ecma)script/i;
        (function() {
          var fragment = document2.createDocumentFragment(), div = fragment.appendChild(document2.createElement("div")), input = document2.createElement("input");
          input.setAttribute("type", "radio");
          input.setAttribute("checked", "checked");
          input.setAttribute("name", "t");
          div.appendChild(input);
          support.checkClone = div.cloneNode(true).cloneNode(true).lastChild.checked;
          div.innerHTML = "<textarea>x</textarea>";
          support.noCloneChecked = !!div.cloneNode(true).lastChild.defaultValue;
          div.innerHTML = "<option></option>";
          support.option = !!div.lastChild;
        })();
        var wrapMap = {
          thead: [1, "<table>", "</table>"],
          col: [2, "<table><colgroup>", "</colgroup></table>"],
          tr: [2, "<table><tbody>", "</tbody></table>"],
          td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
          _default: [0, "", ""]
        };
        wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead;
        wrapMap.th = wrapMap.td;
        if (!support.option) {
          wrapMap.optgroup = wrapMap.option = [1, "<select multiple='multiple'>", "</select>"];
        }
        function getAll(context, tag) {
          var ret;
          if (typeof context.getElementsByTagName !== "undefined") {
            ret = context.getElementsByTagName(tag || "*");
          } else if (typeof context.querySelectorAll !== "undefined") {
            ret = context.querySelectorAll(tag || "*");
          } else {
            ret = [];
          }
          if (tag === void 0 || tag && nodeName(context, tag)) {
            return jQuery2.merge([context], ret);
          }
          return ret;
        }
        function setGlobalEval(elems, refElements) {
          var i = 0, l = elems.length;
          for (; i < l; i++) {
            dataPriv.set(elems[i], "globalEval", !refElements || dataPriv.get(refElements[i], "globalEval"));
          }
        }
        var rhtml = /<|&#?\w+;/;
        function buildFragment(elems, context, scripts, selection, ignored) {
          var elem, tmp, tag, wrap, attached, j, fragment = context.createDocumentFragment(), nodes = [], i = 0, l = elems.length;
          for (; i < l; i++) {
            elem = elems[i];
            if (elem || elem === 0) {
              if (toType(elem) === "object") {
                jQuery2.merge(nodes, elem.nodeType ? [elem] : elem);
              } else if (!rhtml.test(elem)) {
                nodes.push(context.createTextNode(elem));
              } else {
                tmp = tmp || fragment.appendChild(context.createElement("div"));
                tag = (rtagName.exec(elem) || ["", ""])[1].toLowerCase();
                wrap = wrapMap[tag] || wrapMap._default;
                tmp.innerHTML = wrap[1] + jQuery2.htmlPrefilter(elem) + wrap[2];
                j = wrap[0];
                while (j--) {
                  tmp = tmp.lastChild;
                }
                jQuery2.merge(nodes, tmp.childNodes);
                tmp = fragment.firstChild;
                tmp.textContent = "";
              }
            }
          }
          fragment.textContent = "";
          i = 0;
          while (elem = nodes[i++]) {
            if (selection && jQuery2.inArray(elem, selection) > -1) {
              if (ignored) {
                ignored.push(elem);
              }
              continue;
            }
            attached = isAttached(elem);
            tmp = getAll(fragment.appendChild(elem), "script");
            if (attached) {
              setGlobalEval(tmp);
            }
            if (scripts) {
              j = 0;
              while (elem = tmp[j++]) {
                if (rscriptType.test(elem.type || "")) {
                  scripts.push(elem);
                }
              }
            }
          }
          return fragment;
        }
        var rtypenamespace = /^([^.]*)(?:\.(.+)|)/;
        function returnTrue() {
          return true;
        }
        function returnFalse() {
          return false;
        }
        function expectSync(elem, type) {
          return elem === safeActiveElement() === (type === "focus");
        }
        function safeActiveElement() {
          try {
            return document2.activeElement;
          } catch (err) {
          }
        }
        function on(elem, types, selector, data, fn, one) {
          var origFn, type;
          if (typeof types === "object") {
            if (typeof selector !== "string") {
              data = data || selector;
              selector = void 0;
            }
            for (type in types) {
              on(elem, type, selector, data, types[type], one);
            }
            return elem;
          }
          if (data == null && fn == null) {
            fn = selector;
            data = selector = void 0;
          } else if (fn == null) {
            if (typeof selector === "string") {
              fn = data;
              data = void 0;
            } else {
              fn = data;
              data = selector;
              selector = void 0;
            }
          }
          if (fn === false) {
            fn = returnFalse;
          } else if (!fn) {
            return elem;
          }
          if (one === 1) {
            origFn = fn;
            fn = function(event) {
              jQuery2().off(event);
              return origFn.apply(this, arguments);
            };
            fn.guid = origFn.guid || (origFn.guid = jQuery2.guid++);
          }
          return elem.each(function() {
            jQuery2.event.add(this, types, fn, data, selector);
          });
        }
        jQuery2.event = {
          global: {},
          add: function(elem, types, handler, data, selector) {
            var handleObjIn, eventHandle, tmp, events, t, handleObj, special, handlers, type, namespaces, origType, elemData = dataPriv.get(elem);
            if (!acceptData(elem)) {
              return;
            }
            if (handler.handler) {
              handleObjIn = handler;
              handler = handleObjIn.handler;
              selector = handleObjIn.selector;
            }
            if (selector) {
              jQuery2.find.matchesSelector(documentElement, selector);
            }
            if (!handler.guid) {
              handler.guid = jQuery2.guid++;
            }
            if (!(events = elemData.events)) {
              events = elemData.events = /* @__PURE__ */ Object.create(null);
            }
            if (!(eventHandle = elemData.handle)) {
              eventHandle = elemData.handle = function(e) {
                return typeof jQuery2 !== "undefined" && jQuery2.event.triggered !== e.type ? jQuery2.event.dispatch.apply(elem, arguments) : void 0;
              };
            }
            types = (types || "").match(rnothtmlwhite) || [""];
            t = types.length;
            while (t--) {
              tmp = rtypenamespace.exec(types[t]) || [];
              type = origType = tmp[1];
              namespaces = (tmp[2] || "").split(".").sort();
              if (!type) {
                continue;
              }
              special = jQuery2.event.special[type] || {};
              type = (selector ? special.delegateType : special.bindType) || type;
              special = jQuery2.event.special[type] || {};
              handleObj = jQuery2.extend({
                type,
                origType,
                data,
                handler,
                guid: handler.guid,
                selector,
                needsContext: selector && jQuery2.expr.match.needsContext.test(selector),
                namespace: namespaces.join(".")
              }, handleObjIn);
              if (!(handlers = events[type])) {
                handlers = events[type] = [];
                handlers.delegateCount = 0;
                if (!special.setup || special.setup.call(elem, data, namespaces, eventHandle) === false) {
                  if (elem.addEventListener) {
                    elem.addEventListener(type, eventHandle);
                  }
                }
              }
              if (special.add) {
                special.add.call(elem, handleObj);
                if (!handleObj.handler.guid) {
                  handleObj.handler.guid = handler.guid;
                }
              }
              if (selector) {
                handlers.splice(handlers.delegateCount++, 0, handleObj);
              } else {
                handlers.push(handleObj);
              }
              jQuery2.event.global[type] = true;
            }
          },
          remove: function(elem, types, handler, selector, mappedTypes) {
            var j, origCount, tmp, events, t, handleObj, special, handlers, type, namespaces, origType, elemData = dataPriv.hasData(elem) && dataPriv.get(elem);
            if (!elemData || !(events = elemData.events)) {
              return;
            }
            types = (types || "").match(rnothtmlwhite) || [""];
            t = types.length;
            while (t--) {
              tmp = rtypenamespace.exec(types[t]) || [];
              type = origType = tmp[1];
              namespaces = (tmp[2] || "").split(".").sort();
              if (!type) {
                for (type in events) {
                  jQuery2.event.remove(elem, type + types[t], handler, selector, true);
                }
                continue;
              }
              special = jQuery2.event.special[type] || {};
              type = (selector ? special.delegateType : special.bindType) || type;
              handlers = events[type] || [];
              tmp = tmp[2] && new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)");
              origCount = j = handlers.length;
              while (j--) {
                handleObj = handlers[j];
                if ((mappedTypes || origType === handleObj.origType) && (!handler || handler.guid === handleObj.guid) && (!tmp || tmp.test(handleObj.namespace)) && (!selector || selector === handleObj.selector || selector === "**" && handleObj.selector)) {
                  handlers.splice(j, 1);
                  if (handleObj.selector) {
                    handlers.delegateCount--;
                  }
                  if (special.remove) {
                    special.remove.call(elem, handleObj);
                  }
                }
              }
              if (origCount && !handlers.length) {
                if (!special.teardown || special.teardown.call(elem, namespaces, elemData.handle) === false) {
                  jQuery2.removeEvent(elem, type, elemData.handle);
                }
                delete events[type];
              }
            }
            if (jQuery2.isEmptyObject(events)) {
              dataPriv.remove(elem, "handle events");
            }
          },
          dispatch: function(nativeEvent) {
            var i, j, ret, matched, handleObj, handlerQueue, args = new Array(arguments.length), event = jQuery2.event.fix(nativeEvent), handlers = (dataPriv.get(this, "events") || /* @__PURE__ */ Object.create(null))[event.type] || [], special = jQuery2.event.special[event.type] || {};
            args[0] = event;
            for (i = 1; i < arguments.length; i++) {
              args[i] = arguments[i];
            }
            event.delegateTarget = this;
            if (special.preDispatch && special.preDispatch.call(this, event) === false) {
              return;
            }
            handlerQueue = jQuery2.event.handlers.call(this, event, handlers);
            i = 0;
            while ((matched = handlerQueue[i++]) && !event.isPropagationStopped()) {
              event.currentTarget = matched.elem;
              j = 0;
              while ((handleObj = matched.handlers[j++]) && !event.isImmediatePropagationStopped()) {
                if (!event.rnamespace || handleObj.namespace === false || event.rnamespace.test(handleObj.namespace)) {
                  event.handleObj = handleObj;
                  event.data = handleObj.data;
                  ret = ((jQuery2.event.special[handleObj.origType] || {}).handle || handleObj.handler).apply(matched.elem, args);
                  if (ret !== void 0) {
                    if ((event.result = ret) === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                  }
                }
              }
            }
            if (special.postDispatch) {
              special.postDispatch.call(this, event);
            }
            return event.result;
          },
          handlers: function(event, handlers) {
            var i, handleObj, sel, matchedHandlers, matchedSelectors, handlerQueue = [], delegateCount = handlers.delegateCount, cur = event.target;
            if (delegateCount && cur.nodeType && !(event.type === "click" && event.button >= 1)) {
              for (; cur !== this; cur = cur.parentNode || this) {
                if (cur.nodeType === 1 && !(event.type === "click" && cur.disabled === true)) {
                  matchedHandlers = [];
                  matchedSelectors = {};
                  for (i = 0; i < delegateCount; i++) {
                    handleObj = handlers[i];
                    sel = handleObj.selector + " ";
                    if (matchedSelectors[sel] === void 0) {
                      matchedSelectors[sel] = handleObj.needsContext ? jQuery2(sel, this).index(cur) > -1 : jQuery2.find(sel, this, null, [cur]).length;
                    }
                    if (matchedSelectors[sel]) {
                      matchedHandlers.push(handleObj);
                    }
                  }
                  if (matchedHandlers.length) {
                    handlerQueue.push({ elem: cur, handlers: matchedHandlers });
                  }
                }
              }
            }
            cur = this;
            if (delegateCount < handlers.length) {
              handlerQueue.push({ elem: cur, handlers: handlers.slice(delegateCount) });
            }
            return handlerQueue;
          },
          addProp: function(name, hook) {
            Object.defineProperty(jQuery2.Event.prototype, name, {
              enumerable: true,
              configurable: true,
              get: isFunction(hook) ? function() {
                if (this.originalEvent) {
                  return hook(this.originalEvent);
                }
              } : function() {
                if (this.originalEvent) {
                  return this.originalEvent[name];
                }
              },
              set: function(value) {
                Object.defineProperty(this, name, {
                  enumerable: true,
                  configurable: true,
                  writable: true,
                  value
                });
              }
            });
          },
          fix: function(originalEvent) {
            return originalEvent[jQuery2.expando] ? originalEvent : new jQuery2.Event(originalEvent);
          },
          special: {
            load: {
              noBubble: true
            },
            click: {
              setup: function(data) {
                var el = this || data;
                if (rcheckableType.test(el.type) && el.click && nodeName(el, "input")) {
                  leverageNative(el, "click", returnTrue);
                }
                return false;
              },
              trigger: function(data) {
                var el = this || data;
                if (rcheckableType.test(el.type) && el.click && nodeName(el, "input")) {
                  leverageNative(el, "click");
                }
                return true;
              },
              _default: function(event) {
                var target = event.target;
                return rcheckableType.test(target.type) && target.click && nodeName(target, "input") && dataPriv.get(target, "click") || nodeName(target, "a");
              }
            },
            beforeunload: {
              postDispatch: function(event) {
                if (event.result !== void 0 && event.originalEvent) {
                  event.originalEvent.returnValue = event.result;
                }
              }
            }
          }
        };
        function leverageNative(el, type, expectSync2) {
          if (!expectSync2) {
            if (dataPriv.get(el, type) === void 0) {
              jQuery2.event.add(el, type, returnTrue);
            }
            return;
          }
          dataPriv.set(el, type, false);
          jQuery2.event.add(el, type, {
            namespace: false,
            handler: function(event) {
              var notAsync, result, saved = dataPriv.get(this, type);
              if (event.isTrigger & 1 && this[type]) {
                if (!saved.length) {
                  saved = slice.call(arguments);
                  dataPriv.set(this, type, saved);
                  notAsync = expectSync2(this, type);
                  this[type]();
                  result = dataPriv.get(this, type);
                  if (saved !== result || notAsync) {
                    dataPriv.set(this, type, false);
                  } else {
                    result = {};
                  }
                  if (saved !== result) {
                    event.stopImmediatePropagation();
                    event.preventDefault();
                    return result && result.value;
                  }
                } else if ((jQuery2.event.special[type] || {}).delegateType) {
                  event.stopPropagation();
                }
              } else if (saved.length) {
                dataPriv.set(this, type, {
                  value: jQuery2.event.trigger(jQuery2.extend(saved[0], jQuery2.Event.prototype), saved.slice(1), this)
                });
                event.stopImmediatePropagation();
              }
            }
          });
        }
        jQuery2.removeEvent = function(elem, type, handle) {
          if (elem.removeEventListener) {
            elem.removeEventListener(type, handle);
          }
        };
        jQuery2.Event = function(src, props) {
          if (!(this instanceof jQuery2.Event)) {
            return new jQuery2.Event(src, props);
          }
          if (src && src.type) {
            this.originalEvent = src;
            this.type = src.type;
            this.isDefaultPrevented = src.defaultPrevented || src.defaultPrevented === void 0 && src.returnValue === false ? returnTrue : returnFalse;
            this.target = src.target && src.target.nodeType === 3 ? src.target.parentNode : src.target;
            this.currentTarget = src.currentTarget;
            this.relatedTarget = src.relatedTarget;
          } else {
            this.type = src;
          }
          if (props) {
            jQuery2.extend(this, props);
          }
          this.timeStamp = src && src.timeStamp || Date.now();
          this[jQuery2.expando] = true;
        };
        jQuery2.Event.prototype = {
          constructor: jQuery2.Event,
          isDefaultPrevented: returnFalse,
          isPropagationStopped: returnFalse,
          isImmediatePropagationStopped: returnFalse,
          isSimulated: false,
          preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = returnTrue;
            if (e && !this.isSimulated) {
              e.preventDefault();
            }
          },
          stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = returnTrue;
            if (e && !this.isSimulated) {
              e.stopPropagation();
            }
          },
          stopImmediatePropagation: function() {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = returnTrue;
            if (e && !this.isSimulated) {
              e.stopImmediatePropagation();
            }
            this.stopPropagation();
          }
        };
        jQuery2.each({
          altKey: true,
          bubbles: true,
          cancelable: true,
          changedTouches: true,
          ctrlKey: true,
          detail: true,
          eventPhase: true,
          metaKey: true,
          pageX: true,
          pageY: true,
          shiftKey: true,
          view: true,
          "char": true,
          code: true,
          charCode: true,
          key: true,
          keyCode: true,
          button: true,
          buttons: true,
          clientX: true,
          clientY: true,
          offsetX: true,
          offsetY: true,
          pointerId: true,
          pointerType: true,
          screenX: true,
          screenY: true,
          targetTouches: true,
          toElement: true,
          touches: true,
          which: true
        }, jQuery2.event.addProp);
        jQuery2.each({ focus: "focusin", blur: "focusout" }, function(type, delegateType) {
          jQuery2.event.special[type] = {
            setup: function() {
              leverageNative(this, type, expectSync);
              return false;
            },
            trigger: function() {
              leverageNative(this, type);
              return true;
            },
            _default: function() {
              return true;
            },
            delegateType
          };
        });
        jQuery2.each({
          mouseenter: "mouseover",
          mouseleave: "mouseout",
          pointerenter: "pointerover",
          pointerleave: "pointerout"
        }, function(orig, fix) {
          jQuery2.event.special[orig] = {
            delegateType: fix,
            bindType: fix,
            handle: function(event) {
              var ret, target = this, related = event.relatedTarget, handleObj = event.handleObj;
              if (!related || related !== target && !jQuery2.contains(target, related)) {
                event.type = handleObj.origType;
                ret = handleObj.handler.apply(this, arguments);
                event.type = fix;
              }
              return ret;
            }
          };
        });
        jQuery2.fn.extend({
          on: function(types, selector, data, fn) {
            return on(this, types, selector, data, fn);
          },
          one: function(types, selector, data, fn) {
            return on(this, types, selector, data, fn, 1);
          },
          off: function(types, selector, fn) {
            var handleObj, type;
            if (types && types.preventDefault && types.handleObj) {
              handleObj = types.handleObj;
              jQuery2(types.delegateTarget).off(handleObj.namespace ? handleObj.origType + "." + handleObj.namespace : handleObj.origType, handleObj.selector, handleObj.handler);
              return this;
            }
            if (typeof types === "object") {
              for (type in types) {
                this.off(type, selector, types[type]);
              }
              return this;
            }
            if (selector === false || typeof selector === "function") {
              fn = selector;
              selector = void 0;
            }
            if (fn === false) {
              fn = returnFalse;
            }
            return this.each(function() {
              jQuery2.event.remove(this, types, fn, selector);
            });
          }
        });
        var rnoInnerhtml = /<script|<style|<link/i, rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i, rcleanScript = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
        function manipulationTarget(elem, content) {
          if (nodeName(elem, "table") && nodeName(content.nodeType !== 11 ? content : content.firstChild, "tr")) {
            return jQuery2(elem).children("tbody")[0] || elem;
          }
          return elem;
        }
        function disableScript(elem) {
          elem.type = (elem.getAttribute("type") !== null) + "/" + elem.type;
          return elem;
        }
        function restoreScript(elem) {
          if ((elem.type || "").slice(0, 5) === "true/") {
            elem.type = elem.type.slice(5);
          } else {
            elem.removeAttribute("type");
          }
          return elem;
        }
        function cloneCopyEvent(src, dest) {
          var i, l, type, pdataOld, udataOld, udataCur, events;
          if (dest.nodeType !== 1) {
            return;
          }
          if (dataPriv.hasData(src)) {
            pdataOld = dataPriv.get(src);
            events = pdataOld.events;
            if (events) {
              dataPriv.remove(dest, "handle events");
              for (type in events) {
                for (i = 0, l = events[type].length; i < l; i++) {
                  jQuery2.event.add(dest, type, events[type][i]);
                }
              }
            }
          }
          if (dataUser.hasData(src)) {
            udataOld = dataUser.access(src);
            udataCur = jQuery2.extend({}, udataOld);
            dataUser.set(dest, udataCur);
          }
        }
        function fixInput(src, dest) {
          var nodeName2 = dest.nodeName.toLowerCase();
          if (nodeName2 === "input" && rcheckableType.test(src.type)) {
            dest.checked = src.checked;
          } else if (nodeName2 === "input" || nodeName2 === "textarea") {
            dest.defaultValue = src.defaultValue;
          }
        }
        function domManip(collection, args, callback, ignored) {
          args = flat(args);
          var fragment, first, scripts, hasScripts, node, doc, i = 0, l = collection.length, iNoClone = l - 1, value = args[0], valueIsFunction = isFunction(value);
          if (valueIsFunction || l > 1 && typeof value === "string" && !support.checkClone && rchecked.test(value)) {
            return collection.each(function(index) {
              var self2 = collection.eq(index);
              if (valueIsFunction) {
                args[0] = value.call(this, index, self2.html());
              }
              domManip(self2, args, callback, ignored);
            });
          }
          if (l) {
            fragment = buildFragment(args, collection[0].ownerDocument, false, collection, ignored);
            first = fragment.firstChild;
            if (fragment.childNodes.length === 1) {
              fragment = first;
            }
            if (first || ignored) {
              scripts = jQuery2.map(getAll(fragment, "script"), disableScript);
              hasScripts = scripts.length;
              for (; i < l; i++) {
                node = fragment;
                if (i !== iNoClone) {
                  node = jQuery2.clone(node, true, true);
                  if (hasScripts) {
                    jQuery2.merge(scripts, getAll(node, "script"));
                  }
                }
                callback.call(collection[i], node, i);
              }
              if (hasScripts) {
                doc = scripts[scripts.length - 1].ownerDocument;
                jQuery2.map(scripts, restoreScript);
                for (i = 0; i < hasScripts; i++) {
                  node = scripts[i];
                  if (rscriptType.test(node.type || "") && !dataPriv.access(node, "globalEval") && jQuery2.contains(doc, node)) {
                    if (node.src && (node.type || "").toLowerCase() !== "module") {
                      if (jQuery2._evalUrl && !node.noModule) {
                        jQuery2._evalUrl(node.src, {
                          nonce: node.nonce || node.getAttribute("nonce")
                        }, doc);
                      }
                    } else {
                      DOMEval(node.textContent.replace(rcleanScript, ""), node, doc);
                    }
                  }
                }
              }
            }
          }
          return collection;
        }
        function remove(elem, selector, keepData) {
          var node, nodes = selector ? jQuery2.filter(selector, elem) : elem, i = 0;
          for (; (node = nodes[i]) != null; i++) {
            if (!keepData && node.nodeType === 1) {
              jQuery2.cleanData(getAll(node));
            }
            if (node.parentNode) {
              if (keepData && isAttached(node)) {
                setGlobalEval(getAll(node, "script"));
              }
              node.parentNode.removeChild(node);
            }
          }
          return elem;
        }
        jQuery2.extend({
          htmlPrefilter: function(html) {
            return html;
          },
          clone: function(elem, dataAndEvents, deepDataAndEvents) {
            var i, l, srcElements, destElements, clone = elem.cloneNode(true), inPage = isAttached(elem);
            if (!support.noCloneChecked && (elem.nodeType === 1 || elem.nodeType === 11) && !jQuery2.isXMLDoc(elem)) {
              destElements = getAll(clone);
              srcElements = getAll(elem);
              for (i = 0, l = srcElements.length; i < l; i++) {
                fixInput(srcElements[i], destElements[i]);
              }
            }
            if (dataAndEvents) {
              if (deepDataAndEvents) {
                srcElements = srcElements || getAll(elem);
                destElements = destElements || getAll(clone);
                for (i = 0, l = srcElements.length; i < l; i++) {
                  cloneCopyEvent(srcElements[i], destElements[i]);
                }
              } else {
                cloneCopyEvent(elem, clone);
              }
            }
            destElements = getAll(clone, "script");
            if (destElements.length > 0) {
              setGlobalEval(destElements, !inPage && getAll(elem, "script"));
            }
            return clone;
          },
          cleanData: function(elems) {
            var data, elem, type, special = jQuery2.event.special, i = 0;
            for (; (elem = elems[i]) !== void 0; i++) {
              if (acceptData(elem)) {
                if (data = elem[dataPriv.expando]) {
                  if (data.events) {
                    for (type in data.events) {
                      if (special[type]) {
                        jQuery2.event.remove(elem, type);
                      } else {
                        jQuery2.removeEvent(elem, type, data.handle);
                      }
                    }
                  }
                  elem[dataPriv.expando] = void 0;
                }
                if (elem[dataUser.expando]) {
                  elem[dataUser.expando] = void 0;
                }
              }
            }
          }
        });
        jQuery2.fn.extend({
          detach: function(selector) {
            return remove(this, selector, true);
          },
          remove: function(selector) {
            return remove(this, selector);
          },
          text: function(value) {
            return access(this, function(value2) {
              return value2 === void 0 ? jQuery2.text(this) : this.empty().each(function() {
                if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                  this.textContent = value2;
                }
              });
            }, null, value, arguments.length);
          },
          append: function() {
            return domManip(this, arguments, function(elem) {
              if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                var target = manipulationTarget(this, elem);
                target.appendChild(elem);
              }
            });
          },
          prepend: function() {
            return domManip(this, arguments, function(elem) {
              if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                var target = manipulationTarget(this, elem);
                target.insertBefore(elem, target.firstChild);
              }
            });
          },
          before: function() {
            return domManip(this, arguments, function(elem) {
              if (this.parentNode) {
                this.parentNode.insertBefore(elem, this);
              }
            });
          },
          after: function() {
            return domManip(this, arguments, function(elem) {
              if (this.parentNode) {
                this.parentNode.insertBefore(elem, this.nextSibling);
              }
            });
          },
          empty: function() {
            var elem, i = 0;
            for (; (elem = this[i]) != null; i++) {
              if (elem.nodeType === 1) {
                jQuery2.cleanData(getAll(elem, false));
                elem.textContent = "";
              }
            }
            return this;
          },
          clone: function(dataAndEvents, deepDataAndEvents) {
            dataAndEvents = dataAndEvents == null ? false : dataAndEvents;
            deepDataAndEvents = deepDataAndEvents == null ? dataAndEvents : deepDataAndEvents;
            return this.map(function() {
              return jQuery2.clone(this, dataAndEvents, deepDataAndEvents);
            });
          },
          html: function(value) {
            return access(this, function(value2) {
              var elem = this[0] || {}, i = 0, l = this.length;
              if (value2 === void 0 && elem.nodeType === 1) {
                return elem.innerHTML;
              }
              if (typeof value2 === "string" && !rnoInnerhtml.test(value2) && !wrapMap[(rtagName.exec(value2) || ["", ""])[1].toLowerCase()]) {
                value2 = jQuery2.htmlPrefilter(value2);
                try {
                  for (; i < l; i++) {
                    elem = this[i] || {};
                    if (elem.nodeType === 1) {
                      jQuery2.cleanData(getAll(elem, false));
                      elem.innerHTML = value2;
                    }
                  }
                  elem = 0;
                } catch (e) {
                }
              }
              if (elem) {
                this.empty().append(value2);
              }
            }, null, value, arguments.length);
          },
          replaceWith: function() {
            var ignored = [];
            return domManip(this, arguments, function(elem) {
              var parent = this.parentNode;
              if (jQuery2.inArray(this, ignored) < 0) {
                jQuery2.cleanData(getAll(this));
                if (parent) {
                  parent.replaceChild(elem, this);
                }
              }
            }, ignored);
          }
        });
        jQuery2.each({
          appendTo: "append",
          prependTo: "prepend",
          insertBefore: "before",
          insertAfter: "after",
          replaceAll: "replaceWith"
        }, function(name, original) {
          jQuery2.fn[name] = function(selector) {
            var elems, ret = [], insert = jQuery2(selector), last = insert.length - 1, i = 0;
            for (; i <= last; i++) {
              elems = i === last ? this : this.clone(true);
              jQuery2(insert[i])[original](elems);
              push.apply(ret, elems.get());
            }
            return this.pushStack(ret);
          };
        });
        var rnumnonpx = new RegExp("^(" + pnum + ")(?!px)[a-z%]+$", "i");
        var getStyles = function(elem) {
          var view = elem.ownerDocument.defaultView;
          if (!view || !view.opener) {
            view = window2;
          }
          return view.getComputedStyle(elem);
        };
        var swap = function(elem, options, callback) {
          var ret, name, old = {};
          for (name in options) {
            old[name] = elem.style[name];
            elem.style[name] = options[name];
          }
          ret = callback.call(elem);
          for (name in options) {
            elem.style[name] = old[name];
          }
          return ret;
        };
        var rboxStyle = new RegExp(cssExpand.join("|"), "i");
        (function() {
          function computeStyleTests() {
            if (!div) {
              return;
            }
            container.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0";
            div.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%";
            documentElement.appendChild(container).appendChild(div);
            var divStyle = window2.getComputedStyle(div);
            pixelPositionVal = divStyle.top !== "1%";
            reliableMarginLeftVal = roundPixelMeasures(divStyle.marginLeft) === 12;
            div.style.right = "60%";
            pixelBoxStylesVal = roundPixelMeasures(divStyle.right) === 36;
            boxSizingReliableVal = roundPixelMeasures(divStyle.width) === 36;
            div.style.position = "absolute";
            scrollboxSizeVal = roundPixelMeasures(div.offsetWidth / 3) === 12;
            documentElement.removeChild(container);
            div = null;
          }
          function roundPixelMeasures(measure) {
            return Math.round(parseFloat(measure));
          }
          var pixelPositionVal, boxSizingReliableVal, scrollboxSizeVal, pixelBoxStylesVal, reliableTrDimensionsVal, reliableMarginLeftVal, container = document2.createElement("div"), div = document2.createElement("div");
          if (!div.style) {
            return;
          }
          div.style.backgroundClip = "content-box";
          div.cloneNode(true).style.backgroundClip = "";
          support.clearCloneStyle = div.style.backgroundClip === "content-box";
          jQuery2.extend(support, {
            boxSizingReliable: function() {
              computeStyleTests();
              return boxSizingReliableVal;
            },
            pixelBoxStyles: function() {
              computeStyleTests();
              return pixelBoxStylesVal;
            },
            pixelPosition: function() {
              computeStyleTests();
              return pixelPositionVal;
            },
            reliableMarginLeft: function() {
              computeStyleTests();
              return reliableMarginLeftVal;
            },
            scrollboxSize: function() {
              computeStyleTests();
              return scrollboxSizeVal;
            },
            reliableTrDimensions: function() {
              var table, tr, trChild, trStyle;
              if (reliableTrDimensionsVal == null) {
                table = document2.createElement("table");
                tr = document2.createElement("tr");
                trChild = document2.createElement("div");
                table.style.cssText = "position:absolute;left:-11111px;border-collapse:separate";
                tr.style.cssText = "border:1px solid";
                tr.style.height = "1px";
                trChild.style.height = "9px";
                trChild.style.display = "block";
                documentElement.appendChild(table).appendChild(tr).appendChild(trChild);
                trStyle = window2.getComputedStyle(tr);
                reliableTrDimensionsVal = parseInt(trStyle.height, 10) + parseInt(trStyle.borderTopWidth, 10) + parseInt(trStyle.borderBottomWidth, 10) === tr.offsetHeight;
                documentElement.removeChild(table);
              }
              return reliableTrDimensionsVal;
            }
          });
        })();
        function curCSS(elem, name, computed) {
          var width, minWidth, maxWidth, ret, style = elem.style;
          computed = computed || getStyles(elem);
          if (computed) {
            ret = computed.getPropertyValue(name) || computed[name];
            if (ret === "" && !isAttached(elem)) {
              ret = jQuery2.style(elem, name);
            }
            if (!support.pixelBoxStyles() && rnumnonpx.test(ret) && rboxStyle.test(name)) {
              width = style.width;
              minWidth = style.minWidth;
              maxWidth = style.maxWidth;
              style.minWidth = style.maxWidth = style.width = ret;
              ret = computed.width;
              style.width = width;
              style.minWidth = minWidth;
              style.maxWidth = maxWidth;
            }
          }
          return ret !== void 0 ? ret + "" : ret;
        }
        function addGetHookIf(conditionFn, hookFn) {
          return {
            get: function() {
              if (conditionFn()) {
                delete this.get;
                return;
              }
              return (this.get = hookFn).apply(this, arguments);
            }
          };
        }
        var cssPrefixes = ["Webkit", "Moz", "ms"], emptyStyle = document2.createElement("div").style, vendorProps = {};
        function vendorPropName(name) {
          var capName = name[0].toUpperCase() + name.slice(1), i = cssPrefixes.length;
          while (i--) {
            name = cssPrefixes[i] + capName;
            if (name in emptyStyle) {
              return name;
            }
          }
        }
        function finalPropName(name) {
          var final = jQuery2.cssProps[name] || vendorProps[name];
          if (final) {
            return final;
          }
          if (name in emptyStyle) {
            return name;
          }
          return vendorProps[name] = vendorPropName(name) || name;
        }
        var rdisplayswap = /^(none|table(?!-c[ea]).+)/, rcustomProp = /^--/, cssShow = { position: "absolute", visibility: "hidden", display: "block" }, cssNormalTransform = {
          letterSpacing: "0",
          fontWeight: "400"
        };
        function setPositiveNumber(_elem, value, subtract) {
          var matches = rcssNum.exec(value);
          return matches ? Math.max(0, matches[2] - (subtract || 0)) + (matches[3] || "px") : value;
        }
        function boxModelAdjustment(elem, dimension, box, isBorderBox, styles, computedVal) {
          var i = dimension === "width" ? 1 : 0, extra = 0, delta = 0;
          if (box === (isBorderBox ? "border" : "content")) {
            return 0;
          }
          for (; i < 4; i += 2) {
            if (box === "margin") {
              delta += jQuery2.css(elem, box + cssExpand[i], true, styles);
            }
            if (!isBorderBox) {
              delta += jQuery2.css(elem, "padding" + cssExpand[i], true, styles);
              if (box !== "padding") {
                delta += jQuery2.css(elem, "border" + cssExpand[i] + "Width", true, styles);
              } else {
                extra += jQuery2.css(elem, "border" + cssExpand[i] + "Width", true, styles);
              }
            } else {
              if (box === "content") {
                delta -= jQuery2.css(elem, "padding" + cssExpand[i], true, styles);
              }
              if (box !== "margin") {
                delta -= jQuery2.css(elem, "border" + cssExpand[i] + "Width", true, styles);
              }
            }
          }
          if (!isBorderBox && computedVal >= 0) {
            delta += Math.max(0, Math.ceil(elem["offset" + dimension[0].toUpperCase() + dimension.slice(1)] - computedVal - delta - extra - 0.5)) || 0;
          }
          return delta;
        }
        function getWidthOrHeight(elem, dimension, extra) {
          var styles = getStyles(elem), boxSizingNeeded = !support.boxSizingReliable() || extra, isBorderBox = boxSizingNeeded && jQuery2.css(elem, "boxSizing", false, styles) === "border-box", valueIsBorderBox = isBorderBox, val = curCSS(elem, dimension, styles), offsetProp = "offset" + dimension[0].toUpperCase() + dimension.slice(1);
          if (rnumnonpx.test(val)) {
            if (!extra) {
              return val;
            }
            val = "auto";
          }
          if ((!support.boxSizingReliable() && isBorderBox || !support.reliableTrDimensions() && nodeName(elem, "tr") || val === "auto" || !parseFloat(val) && jQuery2.css(elem, "display", false, styles) === "inline") && elem.getClientRects().length) {
            isBorderBox = jQuery2.css(elem, "boxSizing", false, styles) === "border-box";
            valueIsBorderBox = offsetProp in elem;
            if (valueIsBorderBox) {
              val = elem[offsetProp];
            }
          }
          val = parseFloat(val) || 0;
          return val + boxModelAdjustment(elem, dimension, extra || (isBorderBox ? "border" : "content"), valueIsBorderBox, styles, val) + "px";
        }
        jQuery2.extend({
          cssHooks: {
            opacity: {
              get: function(elem, computed) {
                if (computed) {
                  var ret = curCSS(elem, "opacity");
                  return ret === "" ? "1" : ret;
                }
              }
            }
          },
          cssNumber: {
            "animationIterationCount": true,
            "columnCount": true,
            "fillOpacity": true,
            "flexGrow": true,
            "flexShrink": true,
            "fontWeight": true,
            "gridArea": true,
            "gridColumn": true,
            "gridColumnEnd": true,
            "gridColumnStart": true,
            "gridRow": true,
            "gridRowEnd": true,
            "gridRowStart": true,
            "lineHeight": true,
            "opacity": true,
            "order": true,
            "orphans": true,
            "widows": true,
            "zIndex": true,
            "zoom": true
          },
          cssProps: {},
          style: function(elem, name, value, extra) {
            if (!elem || elem.nodeType === 3 || elem.nodeType === 8 || !elem.style) {
              return;
            }
            var ret, type, hooks, origName = camelCase(name), isCustomProp = rcustomProp.test(name), style = elem.style;
            if (!isCustomProp) {
              name = finalPropName(origName);
            }
            hooks = jQuery2.cssHooks[name] || jQuery2.cssHooks[origName];
            if (value !== void 0) {
              type = typeof value;
              if (type === "string" && (ret = rcssNum.exec(value)) && ret[1]) {
                value = adjustCSS(elem, name, ret);
                type = "number";
              }
              if (value == null || value !== value) {
                return;
              }
              if (type === "number" && !isCustomProp) {
                value += ret && ret[3] || (jQuery2.cssNumber[origName] ? "" : "px");
              }
              if (!support.clearCloneStyle && value === "" && name.indexOf("background") === 0) {
                style[name] = "inherit";
              }
              if (!hooks || !("set" in hooks) || (value = hooks.set(elem, value, extra)) !== void 0) {
                if (isCustomProp) {
                  style.setProperty(name, value);
                } else {
                  style[name] = value;
                }
              }
            } else {
              if (hooks && "get" in hooks && (ret = hooks.get(elem, false, extra)) !== void 0) {
                return ret;
              }
              return style[name];
            }
          },
          css: function(elem, name, extra, styles) {
            var val, num, hooks, origName = camelCase(name), isCustomProp = rcustomProp.test(name);
            if (!isCustomProp) {
              name = finalPropName(origName);
            }
            hooks = jQuery2.cssHooks[name] || jQuery2.cssHooks[origName];
            if (hooks && "get" in hooks) {
              val = hooks.get(elem, true, extra);
            }
            if (val === void 0) {
              val = curCSS(elem, name, styles);
            }
            if (val === "normal" && name in cssNormalTransform) {
              val = cssNormalTransform[name];
            }
            if (extra === "" || extra) {
              num = parseFloat(val);
              return extra === true || isFinite(num) ? num || 0 : val;
            }
            return val;
          }
        });
        jQuery2.each(["height", "width"], function(_i, dimension) {
          jQuery2.cssHooks[dimension] = {
            get: function(elem, computed, extra) {
              if (computed) {
                return rdisplayswap.test(jQuery2.css(elem, "display")) && (!elem.getClientRects().length || !elem.getBoundingClientRect().width) ? swap(elem, cssShow, function() {
                  return getWidthOrHeight(elem, dimension, extra);
                }) : getWidthOrHeight(elem, dimension, extra);
              }
            },
            set: function(elem, value, extra) {
              var matches, styles = getStyles(elem), scrollboxSizeBuggy = !support.scrollboxSize() && styles.position === "absolute", boxSizingNeeded = scrollboxSizeBuggy || extra, isBorderBox = boxSizingNeeded && jQuery2.css(elem, "boxSizing", false, styles) === "border-box", subtract = extra ? boxModelAdjustment(elem, dimension, extra, isBorderBox, styles) : 0;
              if (isBorderBox && scrollboxSizeBuggy) {
                subtract -= Math.ceil(elem["offset" + dimension[0].toUpperCase() + dimension.slice(1)] - parseFloat(styles[dimension]) - boxModelAdjustment(elem, dimension, "border", false, styles) - 0.5);
              }
              if (subtract && (matches = rcssNum.exec(value)) && (matches[3] || "px") !== "px") {
                elem.style[dimension] = value;
                value = jQuery2.css(elem, dimension);
              }
              return setPositiveNumber(elem, value, subtract);
            }
          };
        });
        jQuery2.cssHooks.marginLeft = addGetHookIf(support.reliableMarginLeft, function(elem, computed) {
          if (computed) {
            return (parseFloat(curCSS(elem, "marginLeft")) || elem.getBoundingClientRect().left - swap(elem, { marginLeft: 0 }, function() {
              return elem.getBoundingClientRect().left;
            })) + "px";
          }
        });
        jQuery2.each({
          margin: "",
          padding: "",
          border: "Width"
        }, function(prefix, suffix) {
          jQuery2.cssHooks[prefix + suffix] = {
            expand: function(value) {
              var i = 0, expanded = {}, parts = typeof value === "string" ? value.split(" ") : [value];
              for (; i < 4; i++) {
                expanded[prefix + cssExpand[i] + suffix] = parts[i] || parts[i - 2] || parts[0];
              }
              return expanded;
            }
          };
          if (prefix !== "margin") {
            jQuery2.cssHooks[prefix + suffix].set = setPositiveNumber;
          }
        });
        jQuery2.fn.extend({
          css: function(name, value) {
            return access(this, function(elem, name2, value2) {
              var styles, len, map = {}, i = 0;
              if (Array.isArray(name2)) {
                styles = getStyles(elem);
                len = name2.length;
                for (; i < len; i++) {
                  map[name2[i]] = jQuery2.css(elem, name2[i], false, styles);
                }
                return map;
              }
              return value2 !== void 0 ? jQuery2.style(elem, name2, value2) : jQuery2.css(elem, name2);
            }, name, value, arguments.length > 1);
          }
        });
        function Tween(elem, options, prop, end, easing) {
          return new Tween.prototype.init(elem, options, prop, end, easing);
        }
        jQuery2.Tween = Tween;
        Tween.prototype = {
          constructor: Tween,
          init: function(elem, options, prop, end, easing, unit) {
            this.elem = elem;
            this.prop = prop;
            this.easing = easing || jQuery2.easing._default;
            this.options = options;
            this.start = this.now = this.cur();
            this.end = end;
            this.unit = unit || (jQuery2.cssNumber[prop] ? "" : "px");
          },
          cur: function() {
            var hooks = Tween.propHooks[this.prop];
            return hooks && hooks.get ? hooks.get(this) : Tween.propHooks._default.get(this);
          },
          run: function(percent) {
            var eased, hooks = Tween.propHooks[this.prop];
            if (this.options.duration) {
              this.pos = eased = jQuery2.easing[this.easing](percent, this.options.duration * percent, 0, 1, this.options.duration);
            } else {
              this.pos = eased = percent;
            }
            this.now = (this.end - this.start) * eased + this.start;
            if (this.options.step) {
              this.options.step.call(this.elem, this.now, this);
            }
            if (hooks && hooks.set) {
              hooks.set(this);
            } else {
              Tween.propHooks._default.set(this);
            }
            return this;
          }
        };
        Tween.prototype.init.prototype = Tween.prototype;
        Tween.propHooks = {
          _default: {
            get: function(tween) {
              var result;
              if (tween.elem.nodeType !== 1 || tween.elem[tween.prop] != null && tween.elem.style[tween.prop] == null) {
                return tween.elem[tween.prop];
              }
              result = jQuery2.css(tween.elem, tween.prop, "");
              return !result || result === "auto" ? 0 : result;
            },
            set: function(tween) {
              if (jQuery2.fx.step[tween.prop]) {
                jQuery2.fx.step[tween.prop](tween);
              } else if (tween.elem.nodeType === 1 && (jQuery2.cssHooks[tween.prop] || tween.elem.style[finalPropName(tween.prop)] != null)) {
                jQuery2.style(tween.elem, tween.prop, tween.now + tween.unit);
              } else {
                tween.elem[tween.prop] = tween.now;
              }
            }
          }
        };
        Tween.propHooks.scrollTop = Tween.propHooks.scrollLeft = {
          set: function(tween) {
            if (tween.elem.nodeType && tween.elem.parentNode) {
              tween.elem[tween.prop] = tween.now;
            }
          }
        };
        jQuery2.easing = {
          linear: function(p) {
            return p;
          },
          swing: function(p) {
            return 0.5 - Math.cos(p * Math.PI) / 2;
          },
          _default: "swing"
        };
        jQuery2.fx = Tween.prototype.init;
        jQuery2.fx.step = {};
        var fxNow, inProgress, rfxtypes = /^(?:toggle|show|hide)$/, rrun = /queueHooks$/;
        function schedule() {
          if (inProgress) {
            if (document2.hidden === false && window2.requestAnimationFrame) {
              window2.requestAnimationFrame(schedule);
            } else {
              window2.setTimeout(schedule, jQuery2.fx.interval);
            }
            jQuery2.fx.tick();
          }
        }
        function createFxNow() {
          window2.setTimeout(function() {
            fxNow = void 0;
          });
          return fxNow = Date.now();
        }
        function genFx(type, includeWidth) {
          var which, i = 0, attrs = { height: type };
          includeWidth = includeWidth ? 1 : 0;
          for (; i < 4; i += 2 - includeWidth) {
            which = cssExpand[i];
            attrs["margin" + which] = attrs["padding" + which] = type;
          }
          if (includeWidth) {
            attrs.opacity = attrs.width = type;
          }
          return attrs;
        }
        function createTween(value, prop, animation) {
          var tween, collection = (Animation.tweeners[prop] || []).concat(Animation.tweeners["*"]), index = 0, length = collection.length;
          for (; index < length; index++) {
            if (tween = collection[index].call(animation, prop, value)) {
              return tween;
            }
          }
        }
        function defaultPrefilter(elem, props, opts) {
          var prop, value, toggle, hooks, oldfire, propTween, restoreDisplay, display, isBox = "width" in props || "height" in props, anim = this, orig = {}, style = elem.style, hidden = elem.nodeType && isHiddenWithinTree(elem), dataShow = dataPriv.get(elem, "fxshow");
          if (!opts.queue) {
            hooks = jQuery2._queueHooks(elem, "fx");
            if (hooks.unqueued == null) {
              hooks.unqueued = 0;
              oldfire = hooks.empty.fire;
              hooks.empty.fire = function() {
                if (!hooks.unqueued) {
                  oldfire();
                }
              };
            }
            hooks.unqueued++;
            anim.always(function() {
              anim.always(function() {
                hooks.unqueued--;
                if (!jQuery2.queue(elem, "fx").length) {
                  hooks.empty.fire();
                }
              });
            });
          }
          for (prop in props) {
            value = props[prop];
            if (rfxtypes.test(value)) {
              delete props[prop];
              toggle = toggle || value === "toggle";
              if (value === (hidden ? "hide" : "show")) {
                if (value === "show" && dataShow && dataShow[prop] !== void 0) {
                  hidden = true;
                } else {
                  continue;
                }
              }
              orig[prop] = dataShow && dataShow[prop] || jQuery2.style(elem, prop);
            }
          }
          propTween = !jQuery2.isEmptyObject(props);
          if (!propTween && jQuery2.isEmptyObject(orig)) {
            return;
          }
          if (isBox && elem.nodeType === 1) {
            opts.overflow = [style.overflow, style.overflowX, style.overflowY];
            restoreDisplay = dataShow && dataShow.display;
            if (restoreDisplay == null) {
              restoreDisplay = dataPriv.get(elem, "display");
            }
            display = jQuery2.css(elem, "display");
            if (display === "none") {
              if (restoreDisplay) {
                display = restoreDisplay;
              } else {
                showHide([elem], true);
                restoreDisplay = elem.style.display || restoreDisplay;
                display = jQuery2.css(elem, "display");
                showHide([elem]);
              }
            }
            if (display === "inline" || display === "inline-block" && restoreDisplay != null) {
              if (jQuery2.css(elem, "float") === "none") {
                if (!propTween) {
                  anim.done(function() {
                    style.display = restoreDisplay;
                  });
                  if (restoreDisplay == null) {
                    display = style.display;
                    restoreDisplay = display === "none" ? "" : display;
                  }
                }
                style.display = "inline-block";
              }
            }
          }
          if (opts.overflow) {
            style.overflow = "hidden";
            anim.always(function() {
              style.overflow = opts.overflow[0];
              style.overflowX = opts.overflow[1];
              style.overflowY = opts.overflow[2];
            });
          }
          propTween = false;
          for (prop in orig) {
            if (!propTween) {
              if (dataShow) {
                if ("hidden" in dataShow) {
                  hidden = dataShow.hidden;
                }
              } else {
                dataShow = dataPriv.access(elem, "fxshow", { display: restoreDisplay });
              }
              if (toggle) {
                dataShow.hidden = !hidden;
              }
              if (hidden) {
                showHide([elem], true);
              }
              anim.done(function() {
                if (!hidden) {
                  showHide([elem]);
                }
                dataPriv.remove(elem, "fxshow");
                for (prop in orig) {
                  jQuery2.style(elem, prop, orig[prop]);
                }
              });
            }
            propTween = createTween(hidden ? dataShow[prop] : 0, prop, anim);
            if (!(prop in dataShow)) {
              dataShow[prop] = propTween.start;
              if (hidden) {
                propTween.end = propTween.start;
                propTween.start = 0;
              }
            }
          }
        }
        function propFilter(props, specialEasing) {
          var index, name, easing, value, hooks;
          for (index in props) {
            name = camelCase(index);
            easing = specialEasing[name];
            value = props[index];
            if (Array.isArray(value)) {
              easing = value[1];
              value = props[index] = value[0];
            }
            if (index !== name) {
              props[name] = value;
              delete props[index];
            }
            hooks = jQuery2.cssHooks[name];
            if (hooks && "expand" in hooks) {
              value = hooks.expand(value);
              delete props[name];
              for (index in value) {
                if (!(index in props)) {
                  props[index] = value[index];
                  specialEasing[index] = easing;
                }
              }
            } else {
              specialEasing[name] = easing;
            }
          }
        }
        function Animation(elem, properties, options) {
          var result, stopped, index = 0, length = Animation.prefilters.length, deferred = jQuery2.Deferred().always(function() {
            delete tick.elem;
          }), tick = function() {
            if (stopped) {
              return false;
            }
            var currentTime = fxNow || createFxNow(), remaining = Math.max(0, animation.startTime + animation.duration - currentTime), temp = remaining / animation.duration || 0, percent = 1 - temp, index2 = 0, length2 = animation.tweens.length;
            for (; index2 < length2; index2++) {
              animation.tweens[index2].run(percent);
            }
            deferred.notifyWith(elem, [animation, percent, remaining]);
            if (percent < 1 && length2) {
              return remaining;
            }
            if (!length2) {
              deferred.notifyWith(elem, [animation, 1, 0]);
            }
            deferred.resolveWith(elem, [animation]);
            return false;
          }, animation = deferred.promise({
            elem,
            props: jQuery2.extend({}, properties),
            opts: jQuery2.extend(true, {
              specialEasing: {},
              easing: jQuery2.easing._default
            }, options),
            originalProperties: properties,
            originalOptions: options,
            startTime: fxNow || createFxNow(),
            duration: options.duration,
            tweens: [],
            createTween: function(prop, end) {
              var tween = jQuery2.Tween(elem, animation.opts, prop, end, animation.opts.specialEasing[prop] || animation.opts.easing);
              animation.tweens.push(tween);
              return tween;
            },
            stop: function(gotoEnd) {
              var index2 = 0, length2 = gotoEnd ? animation.tweens.length : 0;
              if (stopped) {
                return this;
              }
              stopped = true;
              for (; index2 < length2; index2++) {
                animation.tweens[index2].run(1);
              }
              if (gotoEnd) {
                deferred.notifyWith(elem, [animation, 1, 0]);
                deferred.resolveWith(elem, [animation, gotoEnd]);
              } else {
                deferred.rejectWith(elem, [animation, gotoEnd]);
              }
              return this;
            }
          }), props = animation.props;
          propFilter(props, animation.opts.specialEasing);
          for (; index < length; index++) {
            result = Animation.prefilters[index].call(animation, elem, props, animation.opts);
            if (result) {
              if (isFunction(result.stop)) {
                jQuery2._queueHooks(animation.elem, animation.opts.queue).stop = result.stop.bind(result);
              }
              return result;
            }
          }
          jQuery2.map(props, createTween, animation);
          if (isFunction(animation.opts.start)) {
            animation.opts.start.call(elem, animation);
          }
          animation.progress(animation.opts.progress).done(animation.opts.done, animation.opts.complete).fail(animation.opts.fail).always(animation.opts.always);
          jQuery2.fx.timer(jQuery2.extend(tick, {
            elem,
            anim: animation,
            queue: animation.opts.queue
          }));
          return animation;
        }
        jQuery2.Animation = jQuery2.extend(Animation, {
          tweeners: {
            "*": [function(prop, value) {
              var tween = this.createTween(prop, value);
              adjustCSS(tween.elem, prop, rcssNum.exec(value), tween);
              return tween;
            }]
          },
          tweener: function(props, callback) {
            if (isFunction(props)) {
              callback = props;
              props = ["*"];
            } else {
              props = props.match(rnothtmlwhite);
            }
            var prop, index = 0, length = props.length;
            for (; index < length; index++) {
              prop = props[index];
              Animation.tweeners[prop] = Animation.tweeners[prop] || [];
              Animation.tweeners[prop].unshift(callback);
            }
          },
          prefilters: [defaultPrefilter],
          prefilter: function(callback, prepend) {
            if (prepend) {
              Animation.prefilters.unshift(callback);
            } else {
              Animation.prefilters.push(callback);
            }
          }
        });
        jQuery2.speed = function(speed, easing, fn) {
          var opt = speed && typeof speed === "object" ? jQuery2.extend({}, speed) : {
            complete: fn || !fn && easing || isFunction(speed) && speed,
            duration: speed,
            easing: fn && easing || easing && !isFunction(easing) && easing
          };
          if (jQuery2.fx.off) {
            opt.duration = 0;
          } else {
            if (typeof opt.duration !== "number") {
              if (opt.duration in jQuery2.fx.speeds) {
                opt.duration = jQuery2.fx.speeds[opt.duration];
              } else {
                opt.duration = jQuery2.fx.speeds._default;
              }
            }
          }
          if (opt.queue == null || opt.queue === true) {
            opt.queue = "fx";
          }
          opt.old = opt.complete;
          opt.complete = function() {
            if (isFunction(opt.old)) {
              opt.old.call(this);
            }
            if (opt.queue) {
              jQuery2.dequeue(this, opt.queue);
            }
          };
          return opt;
        };
        jQuery2.fn.extend({
          fadeTo: function(speed, to, easing, callback) {
            return this.filter(isHiddenWithinTree).css("opacity", 0).show().end().animate({ opacity: to }, speed, easing, callback);
          },
          animate: function(prop, speed, easing, callback) {
            var empty = jQuery2.isEmptyObject(prop), optall = jQuery2.speed(speed, easing, callback), doAnimation = function() {
              var anim = Animation(this, jQuery2.extend({}, prop), optall);
              if (empty || dataPriv.get(this, "finish")) {
                anim.stop(true);
              }
            };
            doAnimation.finish = doAnimation;
            return empty || optall.queue === false ? this.each(doAnimation) : this.queue(optall.queue, doAnimation);
          },
          stop: function(type, clearQueue, gotoEnd) {
            var stopQueue = function(hooks) {
              var stop = hooks.stop;
              delete hooks.stop;
              stop(gotoEnd);
            };
            if (typeof type !== "string") {
              gotoEnd = clearQueue;
              clearQueue = type;
              type = void 0;
            }
            if (clearQueue) {
              this.queue(type || "fx", []);
            }
            return this.each(function() {
              var dequeue = true, index = type != null && type + "queueHooks", timers = jQuery2.timers, data = dataPriv.get(this);
              if (index) {
                if (data[index] && data[index].stop) {
                  stopQueue(data[index]);
                }
              } else {
                for (index in data) {
                  if (data[index] && data[index].stop && rrun.test(index)) {
                    stopQueue(data[index]);
                  }
                }
              }
              for (index = timers.length; index--; ) {
                if (timers[index].elem === this && (type == null || timers[index].queue === type)) {
                  timers[index].anim.stop(gotoEnd);
                  dequeue = false;
                  timers.splice(index, 1);
                }
              }
              if (dequeue || !gotoEnd) {
                jQuery2.dequeue(this, type);
              }
            });
          },
          finish: function(type) {
            if (type !== false) {
              type = type || "fx";
            }
            return this.each(function() {
              var index, data = dataPriv.get(this), queue = data[type + "queue"], hooks = data[type + "queueHooks"], timers = jQuery2.timers, length = queue ? queue.length : 0;
              data.finish = true;
              jQuery2.queue(this, type, []);
              if (hooks && hooks.stop) {
                hooks.stop.call(this, true);
              }
              for (index = timers.length; index--; ) {
                if (timers[index].elem === this && timers[index].queue === type) {
                  timers[index].anim.stop(true);
                  timers.splice(index, 1);
                }
              }
              for (index = 0; index < length; index++) {
                if (queue[index] && queue[index].finish) {
                  queue[index].finish.call(this);
                }
              }
              delete data.finish;
            });
          }
        });
        jQuery2.each(["toggle", "show", "hide"], function(_i, name) {
          var cssFn = jQuery2.fn[name];
          jQuery2.fn[name] = function(speed, easing, callback) {
            return speed == null || typeof speed === "boolean" ? cssFn.apply(this, arguments) : this.animate(genFx(name, true), speed, easing, callback);
          };
        });
        jQuery2.each({
          slideDown: genFx("show"),
          slideUp: genFx("hide"),
          slideToggle: genFx("toggle"),
          fadeIn: { opacity: "show" },
          fadeOut: { opacity: "hide" },
          fadeToggle: { opacity: "toggle" }
        }, function(name, props) {
          jQuery2.fn[name] = function(speed, easing, callback) {
            return this.animate(props, speed, easing, callback);
          };
        });
        jQuery2.timers = [];
        jQuery2.fx.tick = function() {
          var timer, i = 0, timers = jQuery2.timers;
          fxNow = Date.now();
          for (; i < timers.length; i++) {
            timer = timers[i];
            if (!timer() && timers[i] === timer) {
              timers.splice(i--, 1);
            }
          }
          if (!timers.length) {
            jQuery2.fx.stop();
          }
          fxNow = void 0;
        };
        jQuery2.fx.timer = function(timer) {
          jQuery2.timers.push(timer);
          jQuery2.fx.start();
        };
        jQuery2.fx.interval = 13;
        jQuery2.fx.start = function() {
          if (inProgress) {
            return;
          }
          inProgress = true;
          schedule();
        };
        jQuery2.fx.stop = function() {
          inProgress = null;
        };
        jQuery2.fx.speeds = {
          slow: 600,
          fast: 200,
          _default: 400
        };
        jQuery2.fn.delay = function(time, type) {
          time = jQuery2.fx ? jQuery2.fx.speeds[time] || time : time;
          type = type || "fx";
          return this.queue(type, function(next, hooks) {
            var timeout = window2.setTimeout(next, time);
            hooks.stop = function() {
              window2.clearTimeout(timeout);
            };
          });
        };
        (function() {
          var input = document2.createElement("input"), select = document2.createElement("select"), opt = select.appendChild(document2.createElement("option"));
          input.type = "checkbox";
          support.checkOn = input.value !== "";
          support.optSelected = opt.selected;
          input = document2.createElement("input");
          input.value = "t";
          input.type = "radio";
          support.radioValue = input.value === "t";
        })();
        var boolHook, attrHandle = jQuery2.expr.attrHandle;
        jQuery2.fn.extend({
          attr: function(name, value) {
            return access(this, jQuery2.attr, name, value, arguments.length > 1);
          },
          removeAttr: function(name) {
            return this.each(function() {
              jQuery2.removeAttr(this, name);
            });
          }
        });
        jQuery2.extend({
          attr: function(elem, name, value) {
            var ret, hooks, nType = elem.nodeType;
            if (nType === 3 || nType === 8 || nType === 2) {
              return;
            }
            if (typeof elem.getAttribute === "undefined") {
              return jQuery2.prop(elem, name, value);
            }
            if (nType !== 1 || !jQuery2.isXMLDoc(elem)) {
              hooks = jQuery2.attrHooks[name.toLowerCase()] || (jQuery2.expr.match.bool.test(name) ? boolHook : void 0);
            }
            if (value !== void 0) {
              if (value === null) {
                jQuery2.removeAttr(elem, name);
                return;
              }
              if (hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== void 0) {
                return ret;
              }
              elem.setAttribute(name, value + "");
              return value;
            }
            if (hooks && "get" in hooks && (ret = hooks.get(elem, name)) !== null) {
              return ret;
            }
            ret = jQuery2.find.attr(elem, name);
            return ret == null ? void 0 : ret;
          },
          attrHooks: {
            type: {
              set: function(elem, value) {
                if (!support.radioValue && value === "radio" && nodeName(elem, "input")) {
                  var val = elem.value;
                  elem.setAttribute("type", value);
                  if (val) {
                    elem.value = val;
                  }
                  return value;
                }
              }
            }
          },
          removeAttr: function(elem, value) {
            var name, i = 0, attrNames = value && value.match(rnothtmlwhite);
            if (attrNames && elem.nodeType === 1) {
              while (name = attrNames[i++]) {
                elem.removeAttribute(name);
              }
            }
          }
        });
        boolHook = {
          set: function(elem, value, name) {
            if (value === false) {
              jQuery2.removeAttr(elem, name);
            } else {
              elem.setAttribute(name, name);
            }
            return name;
          }
        };
        jQuery2.each(jQuery2.expr.match.bool.source.match(/\w+/g), function(_i, name) {
          var getter = attrHandle[name] || jQuery2.find.attr;
          attrHandle[name] = function(elem, name2, isXML) {
            var ret, handle, lowercaseName = name2.toLowerCase();
            if (!isXML) {
              handle = attrHandle[lowercaseName];
              attrHandle[lowercaseName] = ret;
              ret = getter(elem, name2, isXML) != null ? lowercaseName : null;
              attrHandle[lowercaseName] = handle;
            }
            return ret;
          };
        });
        var rfocusable = /^(?:input|select|textarea|button)$/i, rclickable = /^(?:a|area)$/i;
        jQuery2.fn.extend({
          prop: function(name, value) {
            return access(this, jQuery2.prop, name, value, arguments.length > 1);
          },
          removeProp: function(name) {
            return this.each(function() {
              delete this[jQuery2.propFix[name] || name];
            });
          }
        });
        jQuery2.extend({
          prop: function(elem, name, value) {
            var ret, hooks, nType = elem.nodeType;
            if (nType === 3 || nType === 8 || nType === 2) {
              return;
            }
            if (nType !== 1 || !jQuery2.isXMLDoc(elem)) {
              name = jQuery2.propFix[name] || name;
              hooks = jQuery2.propHooks[name];
            }
            if (value !== void 0) {
              if (hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== void 0) {
                return ret;
              }
              return elem[name] = value;
            }
            if (hooks && "get" in hooks && (ret = hooks.get(elem, name)) !== null) {
              return ret;
            }
            return elem[name];
          },
          propHooks: {
            tabIndex: {
              get: function(elem) {
                var tabindex = jQuery2.find.attr(elem, "tabindex");
                if (tabindex) {
                  return parseInt(tabindex, 10);
                }
                if (rfocusable.test(elem.nodeName) || rclickable.test(elem.nodeName) && elem.href) {
                  return 0;
                }
                return -1;
              }
            }
          },
          propFix: {
            "for": "htmlFor",
            "class": "className"
          }
        });
        if (!support.optSelected) {
          jQuery2.propHooks.selected = {
            get: function(elem) {
              var parent = elem.parentNode;
              if (parent && parent.parentNode) {
                parent.parentNode.selectedIndex;
              }
              return null;
            },
            set: function(elem) {
              var parent = elem.parentNode;
              if (parent) {
                parent.selectedIndex;
                if (parent.parentNode) {
                  parent.parentNode.selectedIndex;
                }
              }
            }
          };
        }
        jQuery2.each([
          "tabIndex",
          "readOnly",
          "maxLength",
          "cellSpacing",
          "cellPadding",
          "rowSpan",
          "colSpan",
          "useMap",
          "frameBorder",
          "contentEditable"
        ], function() {
          jQuery2.propFix[this.toLowerCase()] = this;
        });
        function stripAndCollapse(value) {
          var tokens = value.match(rnothtmlwhite) || [];
          return tokens.join(" ");
        }
        function getClass(elem) {
          return elem.getAttribute && elem.getAttribute("class") || "";
        }
        function classesToArray(value) {
          if (Array.isArray(value)) {
            return value;
          }
          if (typeof value === "string") {
            return value.match(rnothtmlwhite) || [];
          }
          return [];
        }
        jQuery2.fn.extend({
          addClass: function(value) {
            var classes, elem, cur, curValue, clazz, j, finalValue, i = 0;
            if (isFunction(value)) {
              return this.each(function(j2) {
                jQuery2(this).addClass(value.call(this, j2, getClass(this)));
              });
            }
            classes = classesToArray(value);
            if (classes.length) {
              while (elem = this[i++]) {
                curValue = getClass(elem);
                cur = elem.nodeType === 1 && " " + stripAndCollapse(curValue) + " ";
                if (cur) {
                  j = 0;
                  while (clazz = classes[j++]) {
                    if (cur.indexOf(" " + clazz + " ") < 0) {
                      cur += clazz + " ";
                    }
                  }
                  finalValue = stripAndCollapse(cur);
                  if (curValue !== finalValue) {
                    elem.setAttribute("class", finalValue);
                  }
                }
              }
            }
            return this;
          },
          removeClass: function(value) {
            var classes, elem, cur, curValue, clazz, j, finalValue, i = 0;
            if (isFunction(value)) {
              return this.each(function(j2) {
                jQuery2(this).removeClass(value.call(this, j2, getClass(this)));
              });
            }
            if (!arguments.length) {
              return this.attr("class", "");
            }
            classes = classesToArray(value);
            if (classes.length) {
              while (elem = this[i++]) {
                curValue = getClass(elem);
                cur = elem.nodeType === 1 && " " + stripAndCollapse(curValue) + " ";
                if (cur) {
                  j = 0;
                  while (clazz = classes[j++]) {
                    while (cur.indexOf(" " + clazz + " ") > -1) {
                      cur = cur.replace(" " + clazz + " ", " ");
                    }
                  }
                  finalValue = stripAndCollapse(cur);
                  if (curValue !== finalValue) {
                    elem.setAttribute("class", finalValue);
                  }
                }
              }
            }
            return this;
          },
          toggleClass: function(value, stateVal) {
            var type = typeof value, isValidValue = type === "string" || Array.isArray(value);
            if (typeof stateVal === "boolean" && isValidValue) {
              return stateVal ? this.addClass(value) : this.removeClass(value);
            }
            if (isFunction(value)) {
              return this.each(function(i) {
                jQuery2(this).toggleClass(value.call(this, i, getClass(this), stateVal), stateVal);
              });
            }
            return this.each(function() {
              var className, i, self2, classNames;
              if (isValidValue) {
                i = 0;
                self2 = jQuery2(this);
                classNames = classesToArray(value);
                while (className = classNames[i++]) {
                  if (self2.hasClass(className)) {
                    self2.removeClass(className);
                  } else {
                    self2.addClass(className);
                  }
                }
              } else if (value === void 0 || type === "boolean") {
                className = getClass(this);
                if (className) {
                  dataPriv.set(this, "__className__", className);
                }
                if (this.setAttribute) {
                  this.setAttribute("class", className || value === false ? "" : dataPriv.get(this, "__className__") || "");
                }
              }
            });
          },
          hasClass: function(selector) {
            var className, elem, i = 0;
            className = " " + selector + " ";
            while (elem = this[i++]) {
              if (elem.nodeType === 1 && (" " + stripAndCollapse(getClass(elem)) + " ").indexOf(className) > -1) {
                return true;
              }
            }
            return false;
          }
        });
        var rreturn = /\r/g;
        jQuery2.fn.extend({
          val: function(value) {
            var hooks, ret, valueIsFunction, elem = this[0];
            if (!arguments.length) {
              if (elem) {
                hooks = jQuery2.valHooks[elem.type] || jQuery2.valHooks[elem.nodeName.toLowerCase()];
                if (hooks && "get" in hooks && (ret = hooks.get(elem, "value")) !== void 0) {
                  return ret;
                }
                ret = elem.value;
                if (typeof ret === "string") {
                  return ret.replace(rreturn, "");
                }
                return ret == null ? "" : ret;
              }
              return;
            }
            valueIsFunction = isFunction(value);
            return this.each(function(i) {
              var val;
              if (this.nodeType !== 1) {
                return;
              }
              if (valueIsFunction) {
                val = value.call(this, i, jQuery2(this).val());
              } else {
                val = value;
              }
              if (val == null) {
                val = "";
              } else if (typeof val === "number") {
                val += "";
              } else if (Array.isArray(val)) {
                val = jQuery2.map(val, function(value2) {
                  return value2 == null ? "" : value2 + "";
                });
              }
              hooks = jQuery2.valHooks[this.type] || jQuery2.valHooks[this.nodeName.toLowerCase()];
              if (!hooks || !("set" in hooks) || hooks.set(this, val, "value") === void 0) {
                this.value = val;
              }
            });
          }
        });
        jQuery2.extend({
          valHooks: {
            option: {
              get: function(elem) {
                var val = jQuery2.find.attr(elem, "value");
                return val != null ? val : stripAndCollapse(jQuery2.text(elem));
              }
            },
            select: {
              get: function(elem) {
                var value, option, i, options = elem.options, index = elem.selectedIndex, one = elem.type === "select-one", values = one ? null : [], max = one ? index + 1 : options.length;
                if (index < 0) {
                  i = max;
                } else {
                  i = one ? index : 0;
                }
                for (; i < max; i++) {
                  option = options[i];
                  if ((option.selected || i === index) && !option.disabled && (!option.parentNode.disabled || !nodeName(option.parentNode, "optgroup"))) {
                    value = jQuery2(option).val();
                    if (one) {
                      return value;
                    }
                    values.push(value);
                  }
                }
                return values;
              },
              set: function(elem, value) {
                var optionSet, option, options = elem.options, values = jQuery2.makeArray(value), i = options.length;
                while (i--) {
                  option = options[i];
                  if (option.selected = jQuery2.inArray(jQuery2.valHooks.option.get(option), values) > -1) {
                    optionSet = true;
                  }
                }
                if (!optionSet) {
                  elem.selectedIndex = -1;
                }
                return values;
              }
            }
          }
        });
        jQuery2.each(["radio", "checkbox"], function() {
          jQuery2.valHooks[this] = {
            set: function(elem, value) {
              if (Array.isArray(value)) {
                return elem.checked = jQuery2.inArray(jQuery2(elem).val(), value) > -1;
              }
            }
          };
          if (!support.checkOn) {
            jQuery2.valHooks[this].get = function(elem) {
              return elem.getAttribute("value") === null ? "on" : elem.value;
            };
          }
        });
        support.focusin = "onfocusin" in window2;
        var rfocusMorph = /^(?:focusinfocus|focusoutblur)$/, stopPropagationCallback = function(e) {
          e.stopPropagation();
        };
        jQuery2.extend(jQuery2.event, {
          trigger: function(event, data, elem, onlyHandlers) {
            var i, cur, tmp, bubbleType, ontype, handle, special, lastElement, eventPath = [elem || document2], type = hasOwn.call(event, "type") ? event.type : event, namespaces = hasOwn.call(event, "namespace") ? event.namespace.split(".") : [];
            cur = lastElement = tmp = elem = elem || document2;
            if (elem.nodeType === 3 || elem.nodeType === 8) {
              return;
            }
            if (rfocusMorph.test(type + jQuery2.event.triggered)) {
              return;
            }
            if (type.indexOf(".") > -1) {
              namespaces = type.split(".");
              type = namespaces.shift();
              namespaces.sort();
            }
            ontype = type.indexOf(":") < 0 && "on" + type;
            event = event[jQuery2.expando] ? event : new jQuery2.Event(type, typeof event === "object" && event);
            event.isTrigger = onlyHandlers ? 2 : 3;
            event.namespace = namespaces.join(".");
            event.rnamespace = event.namespace ? new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)") : null;
            event.result = void 0;
            if (!event.target) {
              event.target = elem;
            }
            data = data == null ? [event] : jQuery2.makeArray(data, [event]);
            special = jQuery2.event.special[type] || {};
            if (!onlyHandlers && special.trigger && special.trigger.apply(elem, data) === false) {
              return;
            }
            if (!onlyHandlers && !special.noBubble && !isWindow(elem)) {
              bubbleType = special.delegateType || type;
              if (!rfocusMorph.test(bubbleType + type)) {
                cur = cur.parentNode;
              }
              for (; cur; cur = cur.parentNode) {
                eventPath.push(cur);
                tmp = cur;
              }
              if (tmp === (elem.ownerDocument || document2)) {
                eventPath.push(tmp.defaultView || tmp.parentWindow || window2);
              }
            }
            i = 0;
            while ((cur = eventPath[i++]) && !event.isPropagationStopped()) {
              lastElement = cur;
              event.type = i > 1 ? bubbleType : special.bindType || type;
              handle = (dataPriv.get(cur, "events") || /* @__PURE__ */ Object.create(null))[event.type] && dataPriv.get(cur, "handle");
              if (handle) {
                handle.apply(cur, data);
              }
              handle = ontype && cur[ontype];
              if (handle && handle.apply && acceptData(cur)) {
                event.result = handle.apply(cur, data);
                if (event.result === false) {
                  event.preventDefault();
                }
              }
            }
            event.type = type;
            if (!onlyHandlers && !event.isDefaultPrevented()) {
              if ((!special._default || special._default.apply(eventPath.pop(), data) === false) && acceptData(elem)) {
                if (ontype && isFunction(elem[type]) && !isWindow(elem)) {
                  tmp = elem[ontype];
                  if (tmp) {
                    elem[ontype] = null;
                  }
                  jQuery2.event.triggered = type;
                  if (event.isPropagationStopped()) {
                    lastElement.addEventListener(type, stopPropagationCallback);
                  }
                  elem[type]();
                  if (event.isPropagationStopped()) {
                    lastElement.removeEventListener(type, stopPropagationCallback);
                  }
                  jQuery2.event.triggered = void 0;
                  if (tmp) {
                    elem[ontype] = tmp;
                  }
                }
              }
            }
            return event.result;
          },
          simulate: function(type, elem, event) {
            var e = jQuery2.extend(new jQuery2.Event(), event, {
              type,
              isSimulated: true
            });
            jQuery2.event.trigger(e, null, elem);
          }
        });
        jQuery2.fn.extend({
          trigger: function(type, data) {
            return this.each(function() {
              jQuery2.event.trigger(type, data, this);
            });
          },
          triggerHandler: function(type, data) {
            var elem = this[0];
            if (elem) {
              return jQuery2.event.trigger(type, data, elem, true);
            }
          }
        });
        if (!support.focusin) {
          jQuery2.each({ focus: "focusin", blur: "focusout" }, function(orig, fix) {
            var handler = function(event) {
              jQuery2.event.simulate(fix, event.target, jQuery2.event.fix(event));
            };
            jQuery2.event.special[fix] = {
              setup: function() {
                var doc = this.ownerDocument || this.document || this, attaches = dataPriv.access(doc, fix);
                if (!attaches) {
                  doc.addEventListener(orig, handler, true);
                }
                dataPriv.access(doc, fix, (attaches || 0) + 1);
              },
              teardown: function() {
                var doc = this.ownerDocument || this.document || this, attaches = dataPriv.access(doc, fix) - 1;
                if (!attaches) {
                  doc.removeEventListener(orig, handler, true);
                  dataPriv.remove(doc, fix);
                } else {
                  dataPriv.access(doc, fix, attaches);
                }
              }
            };
          });
        }
        var location2 = window2.location;
        var nonce = { guid: Date.now() };
        var rquery = /\?/;
        jQuery2.parseXML = function(data) {
          var xml, parserErrorElem;
          if (!data || typeof data !== "string") {
            return null;
          }
          try {
            xml = new window2.DOMParser().parseFromString(data, "text/xml");
          } catch (e) {
          }
          parserErrorElem = xml && xml.getElementsByTagName("parsererror")[0];
          if (!xml || parserErrorElem) {
            jQuery2.error("Invalid XML: " + (parserErrorElem ? jQuery2.map(parserErrorElem.childNodes, function(el) {
              return el.textContent;
            }).join("\n") : data));
          }
          return xml;
        };
        var rbracket = /\[\]$/, rCRLF = /\r?\n/g, rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i, rsubmittable = /^(?:input|select|textarea|keygen)/i;
        function buildParams(prefix, obj, traditional, add) {
          var name;
          if (Array.isArray(obj)) {
            jQuery2.each(obj, function(i, v) {
              if (traditional || rbracket.test(prefix)) {
                add(prefix, v);
              } else {
                buildParams(prefix + "[" + (typeof v === "object" && v != null ? i : "") + "]", v, traditional, add);
              }
            });
          } else if (!traditional && toType(obj) === "object") {
            for (name in obj) {
              buildParams(prefix + "[" + name + "]", obj[name], traditional, add);
            }
          } else {
            add(prefix, obj);
          }
        }
        jQuery2.param = function(a, traditional) {
          var prefix, s = [], add = function(key, valueOrFunction) {
            var value = isFunction(valueOrFunction) ? valueOrFunction() : valueOrFunction;
            s[s.length] = encodeURIComponent(key) + "=" + encodeURIComponent(value == null ? "" : value);
          };
          if (a == null) {
            return "";
          }
          if (Array.isArray(a) || a.jquery && !jQuery2.isPlainObject(a)) {
            jQuery2.each(a, function() {
              add(this.name, this.value);
            });
          } else {
            for (prefix in a) {
              buildParams(prefix, a[prefix], traditional, add);
            }
          }
          return s.join("&");
        };
        jQuery2.fn.extend({
          serialize: function() {
            return jQuery2.param(this.serializeArray());
          },
          serializeArray: function() {
            return this.map(function() {
              var elements = jQuery2.prop(this, "elements");
              return elements ? jQuery2.makeArray(elements) : this;
            }).filter(function() {
              var type = this.type;
              return this.name && !jQuery2(this).is(":disabled") && rsubmittable.test(this.nodeName) && !rsubmitterTypes.test(type) && (this.checked || !rcheckableType.test(type));
            }).map(function(_i, elem) {
              var val = jQuery2(this).val();
              if (val == null) {
                return null;
              }
              if (Array.isArray(val)) {
                return jQuery2.map(val, function(val2) {
                  return { name: elem.name, value: val2.replace(rCRLF, "\r\n") };
                });
              }
              return { name: elem.name, value: val.replace(rCRLF, "\r\n") };
            }).get();
          }
        });
        var r20 = /%20/g, rhash = /#.*$/, rantiCache = /([?&])_=[^&]*/, rheaders = /^(.*?):[ \t]*([^\r\n]*)$/mg, rlocalProtocol = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, rnoContent = /^(?:GET|HEAD)$/, rprotocol = /^\/\//, prefilters = {}, transports = {}, allTypes = "*/".concat("*"), originAnchor = document2.createElement("a");
        originAnchor.href = location2.href;
        function addToPrefiltersOrTransports(structure) {
          return function(dataTypeExpression, func) {
            if (typeof dataTypeExpression !== "string") {
              func = dataTypeExpression;
              dataTypeExpression = "*";
            }
            var dataType, i = 0, dataTypes = dataTypeExpression.toLowerCase().match(rnothtmlwhite) || [];
            if (isFunction(func)) {
              while (dataType = dataTypes[i++]) {
                if (dataType[0] === "+") {
                  dataType = dataType.slice(1) || "*";
                  (structure[dataType] = structure[dataType] || []).unshift(func);
                } else {
                  (structure[dataType] = structure[dataType] || []).push(func);
                }
              }
            }
          };
        }
        function inspectPrefiltersOrTransports(structure, options, originalOptions, jqXHR) {
          var inspected = {}, seekingTransport = structure === transports;
          function inspect(dataType) {
            var selected;
            inspected[dataType] = true;
            jQuery2.each(structure[dataType] || [], function(_, prefilterOrFactory) {
              var dataTypeOrTransport = prefilterOrFactory(options, originalOptions, jqXHR);
              if (typeof dataTypeOrTransport === "string" && !seekingTransport && !inspected[dataTypeOrTransport]) {
                options.dataTypes.unshift(dataTypeOrTransport);
                inspect(dataTypeOrTransport);
                return false;
              } else if (seekingTransport) {
                return !(selected = dataTypeOrTransport);
              }
            });
            return selected;
          }
          return inspect(options.dataTypes[0]) || !inspected["*"] && inspect("*");
        }
        function ajaxExtend(target, src) {
          var key, deep, flatOptions = jQuery2.ajaxSettings.flatOptions || {};
          for (key in src) {
            if (src[key] !== void 0) {
              (flatOptions[key] ? target : deep || (deep = {}))[key] = src[key];
            }
          }
          if (deep) {
            jQuery2.extend(true, target, deep);
          }
          return target;
        }
        function ajaxHandleResponses(s, jqXHR, responses) {
          var ct, type, finalDataType, firstDataType, contents = s.contents, dataTypes = s.dataTypes;
          while (dataTypes[0] === "*") {
            dataTypes.shift();
            if (ct === void 0) {
              ct = s.mimeType || jqXHR.getResponseHeader("Content-Type");
            }
          }
          if (ct) {
            for (type in contents) {
              if (contents[type] && contents[type].test(ct)) {
                dataTypes.unshift(type);
                break;
              }
            }
          }
          if (dataTypes[0] in responses) {
            finalDataType = dataTypes[0];
          } else {
            for (type in responses) {
              if (!dataTypes[0] || s.converters[type + " " + dataTypes[0]]) {
                finalDataType = type;
                break;
              }
              if (!firstDataType) {
                firstDataType = type;
              }
            }
            finalDataType = finalDataType || firstDataType;
          }
          if (finalDataType) {
            if (finalDataType !== dataTypes[0]) {
              dataTypes.unshift(finalDataType);
            }
            return responses[finalDataType];
          }
        }
        function ajaxConvert(s, response, jqXHR, isSuccess) {
          var conv2, current, conv, tmp, prev, converters = {}, dataTypes = s.dataTypes.slice();
          if (dataTypes[1]) {
            for (conv in s.converters) {
              converters[conv.toLowerCase()] = s.converters[conv];
            }
          }
          current = dataTypes.shift();
          while (current) {
            if (s.responseFields[current]) {
              jqXHR[s.responseFields[current]] = response;
            }
            if (!prev && isSuccess && s.dataFilter) {
              response = s.dataFilter(response, s.dataType);
            }
            prev = current;
            current = dataTypes.shift();
            if (current) {
              if (current === "*") {
                current = prev;
              } else if (prev !== "*" && prev !== current) {
                conv = converters[prev + " " + current] || converters["* " + current];
                if (!conv) {
                  for (conv2 in converters) {
                    tmp = conv2.split(" ");
                    if (tmp[1] === current) {
                      conv = converters[prev + " " + tmp[0]] || converters["* " + tmp[0]];
                      if (conv) {
                        if (conv === true) {
                          conv = converters[conv2];
                        } else if (converters[conv2] !== true) {
                          current = tmp[0];
                          dataTypes.unshift(tmp[1]);
                        }
                        break;
                      }
                    }
                  }
                }
                if (conv !== true) {
                  if (conv && s.throws) {
                    response = conv(response);
                  } else {
                    try {
                      response = conv(response);
                    } catch (e) {
                      return {
                        state: "parsererror",
                        error: conv ? e : "No conversion from " + prev + " to " + current
                      };
                    }
                  }
                }
              }
            }
          }
          return { state: "success", data: response };
        }
        jQuery2.extend({
          active: 0,
          lastModified: {},
          etag: {},
          ajaxSettings: {
            url: location2.href,
            type: "GET",
            isLocal: rlocalProtocol.test(location2.protocol),
            global: true,
            processData: true,
            async: true,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
              "*": allTypes,
              text: "text/plain",
              html: "text/html",
              xml: "application/xml, text/xml",
              json: "application/json, text/javascript"
            },
            contents: {
              xml: /\bxml\b/,
              html: /\bhtml/,
              json: /\bjson\b/
            },
            responseFields: {
              xml: "responseXML",
              text: "responseText",
              json: "responseJSON"
            },
            converters: {
              "* text": String,
              "text html": true,
              "text json": JSON.parse,
              "text xml": jQuery2.parseXML
            },
            flatOptions: {
              url: true,
              context: true
            }
          },
          ajaxSetup: function(target, settings) {
            return settings ? ajaxExtend(ajaxExtend(target, jQuery2.ajaxSettings), settings) : ajaxExtend(jQuery2.ajaxSettings, target);
          },
          ajaxPrefilter: addToPrefiltersOrTransports(prefilters),
          ajaxTransport: addToPrefiltersOrTransports(transports),
          ajax: function(url, options) {
            if (typeof url === "object") {
              options = url;
              url = void 0;
            }
            options = options || {};
            var transport, cacheURL, responseHeadersString, responseHeaders, timeoutTimer, urlAnchor, completed2, fireGlobals, i, uncached, s = jQuery2.ajaxSetup({}, options), callbackContext = s.context || s, globalEventContext = s.context && (callbackContext.nodeType || callbackContext.jquery) ? jQuery2(callbackContext) : jQuery2.event, deferred = jQuery2.Deferred(), completeDeferred = jQuery2.Callbacks("once memory"), statusCode = s.statusCode || {}, requestHeaders = {}, requestHeadersNames = {}, strAbort = "canceled", jqXHR = {
              readyState: 0,
              getResponseHeader: function(key) {
                var match;
                if (completed2) {
                  if (!responseHeaders) {
                    responseHeaders = {};
                    while (match = rheaders.exec(responseHeadersString)) {
                      responseHeaders[match[1].toLowerCase() + " "] = (responseHeaders[match[1].toLowerCase() + " "] || []).concat(match[2]);
                    }
                  }
                  match = responseHeaders[key.toLowerCase() + " "];
                }
                return match == null ? null : match.join(", ");
              },
              getAllResponseHeaders: function() {
                return completed2 ? responseHeadersString : null;
              },
              setRequestHeader: function(name, value) {
                if (completed2 == null) {
                  name = requestHeadersNames[name.toLowerCase()] = requestHeadersNames[name.toLowerCase()] || name;
                  requestHeaders[name] = value;
                }
                return this;
              },
              overrideMimeType: function(type) {
                if (completed2 == null) {
                  s.mimeType = type;
                }
                return this;
              },
              statusCode: function(map) {
                var code;
                if (map) {
                  if (completed2) {
                    jqXHR.always(map[jqXHR.status]);
                  } else {
                    for (code in map) {
                      statusCode[code] = [statusCode[code], map[code]];
                    }
                  }
                }
                return this;
              },
              abort: function(statusText) {
                var finalText = statusText || strAbort;
                if (transport) {
                  transport.abort(finalText);
                }
                done(0, finalText);
                return this;
              }
            };
            deferred.promise(jqXHR);
            s.url = ((url || s.url || location2.href) + "").replace(rprotocol, location2.protocol + "//");
            s.type = options.method || options.type || s.method || s.type;
            s.dataTypes = (s.dataType || "*").toLowerCase().match(rnothtmlwhite) || [""];
            if (s.crossDomain == null) {
              urlAnchor = document2.createElement("a");
              try {
                urlAnchor.href = s.url;
                urlAnchor.href = urlAnchor.href;
                s.crossDomain = originAnchor.protocol + "//" + originAnchor.host !== urlAnchor.protocol + "//" + urlAnchor.host;
              } catch (e) {
                s.crossDomain = true;
              }
            }
            if (s.data && s.processData && typeof s.data !== "string") {
              s.data = jQuery2.param(s.data, s.traditional);
            }
            inspectPrefiltersOrTransports(prefilters, s, options, jqXHR);
            if (completed2) {
              return jqXHR;
            }
            fireGlobals = jQuery2.event && s.global;
            if (fireGlobals && jQuery2.active++ === 0) {
              jQuery2.event.trigger("ajaxStart");
            }
            s.type = s.type.toUpperCase();
            s.hasContent = !rnoContent.test(s.type);
            cacheURL = s.url.replace(rhash, "");
            if (!s.hasContent) {
              uncached = s.url.slice(cacheURL.length);
              if (s.data && (s.processData || typeof s.data === "string")) {
                cacheURL += (rquery.test(cacheURL) ? "&" : "?") + s.data;
                delete s.data;
              }
              if (s.cache === false) {
                cacheURL = cacheURL.replace(rantiCache, "$1");
                uncached = (rquery.test(cacheURL) ? "&" : "?") + "_=" + nonce.guid++ + uncached;
              }
              s.url = cacheURL + uncached;
            } else if (s.data && s.processData && (s.contentType || "").indexOf("application/x-www-form-urlencoded") === 0) {
              s.data = s.data.replace(r20, "+");
            }
            if (s.ifModified) {
              if (jQuery2.lastModified[cacheURL]) {
                jqXHR.setRequestHeader("If-Modified-Since", jQuery2.lastModified[cacheURL]);
              }
              if (jQuery2.etag[cacheURL]) {
                jqXHR.setRequestHeader("If-None-Match", jQuery2.etag[cacheURL]);
              }
            }
            if (s.data && s.hasContent && s.contentType !== false || options.contentType) {
              jqXHR.setRequestHeader("Content-Type", s.contentType);
            }
            jqXHR.setRequestHeader("Accept", s.dataTypes[0] && s.accepts[s.dataTypes[0]] ? s.accepts[s.dataTypes[0]] + (s.dataTypes[0] !== "*" ? ", " + allTypes + "; q=0.01" : "") : s.accepts["*"]);
            for (i in s.headers) {
              jqXHR.setRequestHeader(i, s.headers[i]);
            }
            if (s.beforeSend && (s.beforeSend.call(callbackContext, jqXHR, s) === false || completed2)) {
              return jqXHR.abort();
            }
            strAbort = "abort";
            completeDeferred.add(s.complete);
            jqXHR.done(s.success);
            jqXHR.fail(s.error);
            transport = inspectPrefiltersOrTransports(transports, s, options, jqXHR);
            if (!transport) {
              done(-1, "No Transport");
            } else {
              jqXHR.readyState = 1;
              if (fireGlobals) {
                globalEventContext.trigger("ajaxSend", [jqXHR, s]);
              }
              if (completed2) {
                return jqXHR;
              }
              if (s.async && s.timeout > 0) {
                timeoutTimer = window2.setTimeout(function() {
                  jqXHR.abort("timeout");
                }, s.timeout);
              }
              try {
                completed2 = false;
                transport.send(requestHeaders, done);
              } catch (e) {
                if (completed2) {
                  throw e;
                }
                done(-1, e);
              }
            }
            function done(status, nativeStatusText, responses, headers) {
              var isSuccess, success, error, response, modified, statusText = nativeStatusText;
              if (completed2) {
                return;
              }
              completed2 = true;
              if (timeoutTimer) {
                window2.clearTimeout(timeoutTimer);
              }
              transport = void 0;
              responseHeadersString = headers || "";
              jqXHR.readyState = status > 0 ? 4 : 0;
              isSuccess = status >= 200 && status < 300 || status === 304;
              if (responses) {
                response = ajaxHandleResponses(s, jqXHR, responses);
              }
              if (!isSuccess && jQuery2.inArray("script", s.dataTypes) > -1 && jQuery2.inArray("json", s.dataTypes) < 0) {
                s.converters["text script"] = function() {
                };
              }
              response = ajaxConvert(s, response, jqXHR, isSuccess);
              if (isSuccess) {
                if (s.ifModified) {
                  modified = jqXHR.getResponseHeader("Last-Modified");
                  if (modified) {
                    jQuery2.lastModified[cacheURL] = modified;
                  }
                  modified = jqXHR.getResponseHeader("etag");
                  if (modified) {
                    jQuery2.etag[cacheURL] = modified;
                  }
                }
                if (status === 204 || s.type === "HEAD") {
                  statusText = "nocontent";
                } else if (status === 304) {
                  statusText = "notmodified";
                } else {
                  statusText = response.state;
                  success = response.data;
                  error = response.error;
                  isSuccess = !error;
                }
              } else {
                error = statusText;
                if (status || !statusText) {
                  statusText = "error";
                  if (status < 0) {
                    status = 0;
                  }
                }
              }
              jqXHR.status = status;
              jqXHR.statusText = (nativeStatusText || statusText) + "";
              if (isSuccess) {
                deferred.resolveWith(callbackContext, [success, statusText, jqXHR]);
              } else {
                deferred.rejectWith(callbackContext, [jqXHR, statusText, error]);
              }
              jqXHR.statusCode(statusCode);
              statusCode = void 0;
              if (fireGlobals) {
                globalEventContext.trigger(isSuccess ? "ajaxSuccess" : "ajaxError", [jqXHR, s, isSuccess ? success : error]);
              }
              completeDeferred.fireWith(callbackContext, [jqXHR, statusText]);
              if (fireGlobals) {
                globalEventContext.trigger("ajaxComplete", [jqXHR, s]);
                if (!--jQuery2.active) {
                  jQuery2.event.trigger("ajaxStop");
                }
              }
            }
            return jqXHR;
          },
          getJSON: function(url, data, callback) {
            return jQuery2.get(url, data, callback, "json");
          },
          getScript: function(url, callback) {
            return jQuery2.get(url, void 0, callback, "script");
          }
        });
        jQuery2.each(["get", "post"], function(_i, method) {
          jQuery2[method] = function(url, data, callback, type) {
            if (isFunction(data)) {
              type = type || callback;
              callback = data;
              data = void 0;
            }
            return jQuery2.ajax(jQuery2.extend({
              url,
              type: method,
              dataType: type,
              data,
              success: callback
            }, jQuery2.isPlainObject(url) && url));
          };
        });
        jQuery2.ajaxPrefilter(function(s) {
          var i;
          for (i in s.headers) {
            if (i.toLowerCase() === "content-type") {
              s.contentType = s.headers[i] || "";
            }
          }
        });
        jQuery2._evalUrl = function(url, options, doc) {
          return jQuery2.ajax({
            url,
            type: "GET",
            dataType: "script",
            cache: true,
            async: false,
            global: false,
            converters: {
              "text script": function() {
              }
            },
            dataFilter: function(response) {
              jQuery2.globalEval(response, options, doc);
            }
          });
        };
        jQuery2.fn.extend({
          wrapAll: function(html) {
            var wrap;
            if (this[0]) {
              if (isFunction(html)) {
                html = html.call(this[0]);
              }
              wrap = jQuery2(html, this[0].ownerDocument).eq(0).clone(true);
              if (this[0].parentNode) {
                wrap.insertBefore(this[0]);
              }
              wrap.map(function() {
                var elem = this;
                while (elem.firstElementChild) {
                  elem = elem.firstElementChild;
                }
                return elem;
              }).append(this);
            }
            return this;
          },
          wrapInner: function(html) {
            if (isFunction(html)) {
              return this.each(function(i) {
                jQuery2(this).wrapInner(html.call(this, i));
              });
            }
            return this.each(function() {
              var self2 = jQuery2(this), contents = self2.contents();
              if (contents.length) {
                contents.wrapAll(html);
              } else {
                self2.append(html);
              }
            });
          },
          wrap: function(html) {
            var htmlIsFunction = isFunction(html);
            return this.each(function(i) {
              jQuery2(this).wrapAll(htmlIsFunction ? html.call(this, i) : html);
            });
          },
          unwrap: function(selector) {
            this.parent(selector).not("body").each(function() {
              jQuery2(this).replaceWith(this.childNodes);
            });
            return this;
          }
        });
        jQuery2.expr.pseudos.hidden = function(elem) {
          return !jQuery2.expr.pseudos.visible(elem);
        };
        jQuery2.expr.pseudos.visible = function(elem) {
          return !!(elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length);
        };
        jQuery2.ajaxSettings.xhr = function() {
          try {
            return new window2.XMLHttpRequest();
          } catch (e) {
          }
        };
        var xhrSuccessStatus = {
          0: 200,
          1223: 204
        }, xhrSupported = jQuery2.ajaxSettings.xhr();
        support.cors = !!xhrSupported && "withCredentials" in xhrSupported;
        support.ajax = xhrSupported = !!xhrSupported;
        jQuery2.ajaxTransport(function(options) {
          var callback, errorCallback;
          if (support.cors || xhrSupported && !options.crossDomain) {
            return {
              send: function(headers, complete) {
                var i, xhr = options.xhr();
                xhr.open(options.type, options.url, options.async, options.username, options.password);
                if (options.xhrFields) {
                  for (i in options.xhrFields) {
                    xhr[i] = options.xhrFields[i];
                  }
                }
                if (options.mimeType && xhr.overrideMimeType) {
                  xhr.overrideMimeType(options.mimeType);
                }
                if (!options.crossDomain && !headers["X-Requested-With"]) {
                  headers["X-Requested-With"] = "XMLHttpRequest";
                }
                for (i in headers) {
                  xhr.setRequestHeader(i, headers[i]);
                }
                callback = function(type) {
                  return function() {
                    if (callback) {
                      callback = errorCallback = xhr.onload = xhr.onerror = xhr.onabort = xhr.ontimeout = xhr.onreadystatechange = null;
                      if (type === "abort") {
                        xhr.abort();
                      } else if (type === "error") {
                        if (typeof xhr.status !== "number") {
                          complete(0, "error");
                        } else {
                          complete(xhr.status, xhr.statusText);
                        }
                      } else {
                        complete(xhrSuccessStatus[xhr.status] || xhr.status, xhr.statusText, (xhr.responseType || "text") !== "text" || typeof xhr.responseText !== "string" ? { binary: xhr.response } : { text: xhr.responseText }, xhr.getAllResponseHeaders());
                      }
                    }
                  };
                };
                xhr.onload = callback();
                errorCallback = xhr.onerror = xhr.ontimeout = callback("error");
                if (xhr.onabort !== void 0) {
                  xhr.onabort = errorCallback;
                } else {
                  xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                      window2.setTimeout(function() {
                        if (callback) {
                          errorCallback();
                        }
                      });
                    }
                  };
                }
                callback = callback("abort");
                try {
                  xhr.send(options.hasContent && options.data || null);
                } catch (e) {
                  if (callback) {
                    throw e;
                  }
                }
              },
              abort: function() {
                if (callback) {
                  callback();
                }
              }
            };
          }
        });
        jQuery2.ajaxPrefilter(function(s) {
          if (s.crossDomain) {
            s.contents.script = false;
          }
        });
        jQuery2.ajaxSetup({
          accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
          },
          contents: {
            script: /\b(?:java|ecma)script\b/
          },
          converters: {
            "text script": function(text) {
              jQuery2.globalEval(text);
              return text;
            }
          }
        });
        jQuery2.ajaxPrefilter("script", function(s) {
          if (s.cache === void 0) {
            s.cache = false;
          }
          if (s.crossDomain) {
            s.type = "GET";
          }
        });
        jQuery2.ajaxTransport("script", function(s) {
          if (s.crossDomain || s.scriptAttrs) {
            var script, callback;
            return {
              send: function(_, complete) {
                script = jQuery2("<script>").attr(s.scriptAttrs || {}).prop({ charset: s.scriptCharset, src: s.url }).on("load error", callback = function(evt) {
                  script.remove();
                  callback = null;
                  if (evt) {
                    complete(evt.type === "error" ? 404 : 200, evt.type);
                  }
                });
                document2.head.appendChild(script[0]);
              },
              abort: function() {
                if (callback) {
                  callback();
                }
              }
            };
          }
        });
        var oldCallbacks = [], rjsonp = /(=)\?(?=&|$)|\?\?/;
        jQuery2.ajaxSetup({
          jsonp: "callback",
          jsonpCallback: function() {
            var callback = oldCallbacks.pop() || jQuery2.expando + "_" + nonce.guid++;
            this[callback] = true;
            return callback;
          }
        });
        jQuery2.ajaxPrefilter("json jsonp", function(s, originalSettings, jqXHR) {
          var callbackName, overwritten, responseContainer, jsonProp = s.jsonp !== false && (rjsonp.test(s.url) ? "url" : typeof s.data === "string" && (s.contentType || "").indexOf("application/x-www-form-urlencoded") === 0 && rjsonp.test(s.data) && "data");
          if (jsonProp || s.dataTypes[0] === "jsonp") {
            callbackName = s.jsonpCallback = isFunction(s.jsonpCallback) ? s.jsonpCallback() : s.jsonpCallback;
            if (jsonProp) {
              s[jsonProp] = s[jsonProp].replace(rjsonp, "$1" + callbackName);
            } else if (s.jsonp !== false) {
              s.url += (rquery.test(s.url) ? "&" : "?") + s.jsonp + "=" + callbackName;
            }
            s.converters["script json"] = function() {
              if (!responseContainer) {
                jQuery2.error(callbackName + " was not called");
              }
              return responseContainer[0];
            };
            s.dataTypes[0] = "json";
            overwritten = window2[callbackName];
            window2[callbackName] = function() {
              responseContainer = arguments;
            };
            jqXHR.always(function() {
              if (overwritten === void 0) {
                jQuery2(window2).removeProp(callbackName);
              } else {
                window2[callbackName] = overwritten;
              }
              if (s[callbackName]) {
                s.jsonpCallback = originalSettings.jsonpCallback;
                oldCallbacks.push(callbackName);
              }
              if (responseContainer && isFunction(overwritten)) {
                overwritten(responseContainer[0]);
              }
              responseContainer = overwritten = void 0;
            });
            return "script";
          }
        });
        support.createHTMLDocument = function() {
          var body = document2.implementation.createHTMLDocument("").body;
          body.innerHTML = "<form></form><form></form>";
          return body.childNodes.length === 2;
        }();
        jQuery2.parseHTML = function(data, context, keepScripts) {
          if (typeof data !== "string") {
            return [];
          }
          if (typeof context === "boolean") {
            keepScripts = context;
            context = false;
          }
          var base, parsed, scripts;
          if (!context) {
            if (support.createHTMLDocument) {
              context = document2.implementation.createHTMLDocument("");
              base = context.createElement("base");
              base.href = document2.location.href;
              context.head.appendChild(base);
            } else {
              context = document2;
            }
          }
          parsed = rsingleTag.exec(data);
          scripts = !keepScripts && [];
          if (parsed) {
            return [context.createElement(parsed[1])];
          }
          parsed = buildFragment([data], context, scripts);
          if (scripts && scripts.length) {
            jQuery2(scripts).remove();
          }
          return jQuery2.merge([], parsed.childNodes);
        };
        jQuery2.fn.load = function(url, params, callback) {
          var selector, type, response, self2 = this, off = url.indexOf(" ");
          if (off > -1) {
            selector = stripAndCollapse(url.slice(off));
            url = url.slice(0, off);
          }
          if (isFunction(params)) {
            callback = params;
            params = void 0;
          } else if (params && typeof params === "object") {
            type = "POST";
          }
          if (self2.length > 0) {
            jQuery2.ajax({
              url,
              type: type || "GET",
              dataType: "html",
              data: params
            }).done(function(responseText) {
              response = arguments;
              self2.html(selector ? jQuery2("<div>").append(jQuery2.parseHTML(responseText)).find(selector) : responseText);
            }).always(callback && function(jqXHR, status) {
              self2.each(function() {
                callback.apply(this, response || [jqXHR.responseText, status, jqXHR]);
              });
            });
          }
          return this;
        };
        jQuery2.expr.pseudos.animated = function(elem) {
          return jQuery2.grep(jQuery2.timers, function(fn) {
            return elem === fn.elem;
          }).length;
        };
        jQuery2.offset = {
          setOffset: function(elem, options, i) {
            var curPosition, curLeft, curCSSTop, curTop, curOffset, curCSSLeft, calculatePosition, position = jQuery2.css(elem, "position"), curElem = jQuery2(elem), props = {};
            if (position === "static") {
              elem.style.position = "relative";
            }
            curOffset = curElem.offset();
            curCSSTop = jQuery2.css(elem, "top");
            curCSSLeft = jQuery2.css(elem, "left");
            calculatePosition = (position === "absolute" || position === "fixed") && (curCSSTop + curCSSLeft).indexOf("auto") > -1;
            if (calculatePosition) {
              curPosition = curElem.position();
              curTop = curPosition.top;
              curLeft = curPosition.left;
            } else {
              curTop = parseFloat(curCSSTop) || 0;
              curLeft = parseFloat(curCSSLeft) || 0;
            }
            if (isFunction(options)) {
              options = options.call(elem, i, jQuery2.extend({}, curOffset));
            }
            if (options.top != null) {
              props.top = options.top - curOffset.top + curTop;
            }
            if (options.left != null) {
              props.left = options.left - curOffset.left + curLeft;
            }
            if ("using" in options) {
              options.using.call(elem, props);
            } else {
              curElem.css(props);
            }
          }
        };
        jQuery2.fn.extend({
          offset: function(options) {
            if (arguments.length) {
              return options === void 0 ? this : this.each(function(i) {
                jQuery2.offset.setOffset(this, options, i);
              });
            }
            var rect, win, elem = this[0];
            if (!elem) {
              return;
            }
            if (!elem.getClientRects().length) {
              return { top: 0, left: 0 };
            }
            rect = elem.getBoundingClientRect();
            win = elem.ownerDocument.defaultView;
            return {
              top: rect.top + win.pageYOffset,
              left: rect.left + win.pageXOffset
            };
          },
          position: function() {
            if (!this[0]) {
              return;
            }
            var offsetParent, offset, doc, elem = this[0], parentOffset = { top: 0, left: 0 };
            if (jQuery2.css(elem, "position") === "fixed") {
              offset = elem.getBoundingClientRect();
            } else {
              offset = this.offset();
              doc = elem.ownerDocument;
              offsetParent = elem.offsetParent || doc.documentElement;
              while (offsetParent && (offsetParent === doc.body || offsetParent === doc.documentElement) && jQuery2.css(offsetParent, "position") === "static") {
                offsetParent = offsetParent.parentNode;
              }
              if (offsetParent && offsetParent !== elem && offsetParent.nodeType === 1) {
                parentOffset = jQuery2(offsetParent).offset();
                parentOffset.top += jQuery2.css(offsetParent, "borderTopWidth", true);
                parentOffset.left += jQuery2.css(offsetParent, "borderLeftWidth", true);
              }
            }
            return {
              top: offset.top - parentOffset.top - jQuery2.css(elem, "marginTop", true),
              left: offset.left - parentOffset.left - jQuery2.css(elem, "marginLeft", true)
            };
          },
          offsetParent: function() {
            return this.map(function() {
              var offsetParent = this.offsetParent;
              while (offsetParent && jQuery2.css(offsetParent, "position") === "static") {
                offsetParent = offsetParent.offsetParent;
              }
              return offsetParent || documentElement;
            });
          }
        });
        jQuery2.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function(method, prop) {
          var top = prop === "pageYOffset";
          jQuery2.fn[method] = function(val) {
            return access(this, function(elem, method2, val2) {
              var win;
              if (isWindow(elem)) {
                win = elem;
              } else if (elem.nodeType === 9) {
                win = elem.defaultView;
              }
              if (val2 === void 0) {
                return win ? win[prop] : elem[method2];
              }
              if (win) {
                win.scrollTo(!top ? val2 : win.pageXOffset, top ? val2 : win.pageYOffset);
              } else {
                elem[method2] = val2;
              }
            }, method, val, arguments.length);
          };
        });
        jQuery2.each(["top", "left"], function(_i, prop) {
          jQuery2.cssHooks[prop] = addGetHookIf(support.pixelPosition, function(elem, computed) {
            if (computed) {
              computed = curCSS(elem, prop);
              return rnumnonpx.test(computed) ? jQuery2(elem).position()[prop] + "px" : computed;
            }
          });
        });
        jQuery2.each({ Height: "height", Width: "width" }, function(name, type) {
          jQuery2.each({
            padding: "inner" + name,
            content: type,
            "": "outer" + name
          }, function(defaultExtra, funcName) {
            jQuery2.fn[funcName] = function(margin, value) {
              var chainable = arguments.length && (defaultExtra || typeof margin !== "boolean"), extra = defaultExtra || (margin === true || value === true ? "margin" : "border");
              return access(this, function(elem, type2, value2) {
                var doc;
                if (isWindow(elem)) {
                  return funcName.indexOf("outer") === 0 ? elem["inner" + name] : elem.document.documentElement["client" + name];
                }
                if (elem.nodeType === 9) {
                  doc = elem.documentElement;
                  return Math.max(elem.body["scroll" + name], doc["scroll" + name], elem.body["offset" + name], doc["offset" + name], doc["client" + name]);
                }
                return value2 === void 0 ? jQuery2.css(elem, type2, extra) : jQuery2.style(elem, type2, value2, extra);
              }, type, chainable ? margin : void 0, chainable);
            };
          });
        });
        jQuery2.each([
          "ajaxStart",
          "ajaxStop",
          "ajaxComplete",
          "ajaxError",
          "ajaxSuccess",
          "ajaxSend"
        ], function(_i, type) {
          jQuery2.fn[type] = function(fn) {
            return this.on(type, fn);
          };
        });
        jQuery2.fn.extend({
          bind: function(types, data, fn) {
            return this.on(types, null, data, fn);
          },
          unbind: function(types, fn) {
            return this.off(types, null, fn);
          },
          delegate: function(selector, types, data, fn) {
            return this.on(types, selector, data, fn);
          },
          undelegate: function(selector, types, fn) {
            return arguments.length === 1 ? this.off(selector, "**") : this.off(types, selector || "**", fn);
          },
          hover: function(fnOver, fnOut) {
            return this.mouseenter(fnOver).mouseleave(fnOut || fnOver);
          }
        });
        jQuery2.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function(_i, name) {
          jQuery2.fn[name] = function(data, fn) {
            return arguments.length > 0 ? this.on(name, null, data, fn) : this.trigger(name);
          };
        });
        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        jQuery2.proxy = function(fn, context) {
          var tmp, args, proxy;
          if (typeof context === "string") {
            tmp = fn[context];
            context = fn;
            fn = tmp;
          }
          if (!isFunction(fn)) {
            return void 0;
          }
          args = slice.call(arguments, 2);
          proxy = function() {
            return fn.apply(context || this, args.concat(slice.call(arguments)));
          };
          proxy.guid = fn.guid = fn.guid || jQuery2.guid++;
          return proxy;
        };
        jQuery2.holdReady = function(hold) {
          if (hold) {
            jQuery2.readyWait++;
          } else {
            jQuery2.ready(true);
          }
        };
        jQuery2.isArray = Array.isArray;
        jQuery2.parseJSON = JSON.parse;
        jQuery2.nodeName = nodeName;
        jQuery2.isFunction = isFunction;
        jQuery2.isWindow = isWindow;
        jQuery2.camelCase = camelCase;
        jQuery2.type = toType;
        jQuery2.now = Date.now;
        jQuery2.isNumeric = function(obj) {
          var type = jQuery2.type(obj);
          return (type === "number" || type === "string") && !isNaN(obj - parseFloat(obj));
        };
        jQuery2.trim = function(text) {
          return text == null ? "" : (text + "").replace(rtrim, "");
        };
        if (typeof define === "function" && define.amd) {
          define("jquery", [], function() {
            return jQuery2;
          });
        }
        var _jQuery = window2.jQuery, _$ = window2.$;
        jQuery2.noConflict = function(deep) {
          if (window2.$ === jQuery2) {
            window2.$ = _$;
          }
          if (deep && window2.jQuery === jQuery2) {
            window2.jQuery = _jQuery;
          }
          return jQuery2;
        };
        if (typeof noGlobal === "undefined") {
          window2.jQuery = window2.$ = jQuery2;
        }
        return jQuery2;
      });
    }
  });

  // node_modules/jquery-validation/dist/jquery.validate.js
  var require_jquery_validate = __commonJS({
    "node_modules/jquery-validation/dist/jquery.validate.js"(exports, module) {
      (function(factory) {
        if (typeof define === "function" && define.amd) {
          define(["jquery"], factory);
        } else if (typeof module === "object" && module.exports) {
          module.exports = factory(require_jquery());
        } else {
          factory(jQuery);
        }
      })(function($) {
        $.extend($.fn, {
          validate: function(options) {
            if (!this.length) {
              if (options && options.debug && window.console) {
                console.warn("Nothing selected, can't validate, returning nothing.");
              }
              return;
            }
            var validator = $.data(this[0], "validator");
            if (validator) {
              return validator;
            }
            this.attr("novalidate", "novalidate");
            validator = new $.validator(options, this[0]);
            $.data(this[0], "validator", validator);
            if (validator.settings.onsubmit) {
              this.on("click.validate", ":submit", function(event) {
                validator.submitButton = event.currentTarget;
                if ($(this).hasClass("cancel")) {
                  validator.cancelSubmit = true;
                }
                if ($(this).attr("formnovalidate") !== void 0) {
                  validator.cancelSubmit = true;
                }
              });
              this.on("submit.validate", function(event) {
                if (validator.settings.debug) {
                  event.preventDefault();
                }
                function handle() {
                  var hidden, result;
                  if (validator.submitButton && (validator.settings.submitHandler || validator.formSubmitted)) {
                    hidden = $("<input type='hidden'/>").attr("name", validator.submitButton.name).val($(validator.submitButton).val()).appendTo(validator.currentForm);
                  }
                  if (validator.settings.submitHandler && !validator.settings.debug) {
                    result = validator.settings.submitHandler.call(validator, validator.currentForm, event);
                    if (hidden) {
                      hidden.remove();
                    }
                    if (result !== void 0) {
                      return result;
                    }
                    return false;
                  }
                  return true;
                }
                if (validator.cancelSubmit) {
                  validator.cancelSubmit = false;
                  return handle();
                }
                if (validator.form()) {
                  if (validator.pendingRequest) {
                    validator.formSubmitted = true;
                    return false;
                  }
                  return handle();
                } else {
                  validator.focusInvalid();
                  return false;
                }
              });
            }
            return validator;
          },
          valid: function() {
            var valid, validator, errorList;
            if ($(this[0]).is("form")) {
              valid = this.validate().form();
            } else {
              errorList = [];
              valid = true;
              validator = $(this[0].form).validate();
              this.each(function() {
                valid = validator.element(this) && valid;
                if (!valid) {
                  errorList = errorList.concat(validator.errorList);
                }
              });
              validator.errorList = errorList;
            }
            return valid;
          },
          rules: function(command, argument) {
            var element = this[0], isContentEditable = typeof this.attr("contenteditable") !== "undefined" && this.attr("contenteditable") !== "false", settings, staticRules, existingRules, data, param, filtered;
            if (element == null) {
              return;
            }
            if (!element.form && isContentEditable) {
              element.form = this.closest("form")[0];
              element.name = this.attr("name");
            }
            if (element.form == null) {
              return;
            }
            if (command) {
              settings = $.data(element.form, "validator").settings;
              staticRules = settings.rules;
              existingRules = $.validator.staticRules(element);
              switch (command) {
                case "add":
                  $.extend(existingRules, $.validator.normalizeRule(argument));
                  delete existingRules.messages;
                  staticRules[element.name] = existingRules;
                  if (argument.messages) {
                    settings.messages[element.name] = $.extend(settings.messages[element.name], argument.messages);
                  }
                  break;
                case "remove":
                  if (!argument) {
                    delete staticRules[element.name];
                    return existingRules;
                  }
                  filtered = {};
                  $.each(argument.split(/\s/), function(index, method) {
                    filtered[method] = existingRules[method];
                    delete existingRules[method];
                  });
                  return filtered;
              }
            }
            data = $.validator.normalizeRules($.extend({}, $.validator.classRules(element), $.validator.attributeRules(element), $.validator.dataRules(element), $.validator.staticRules(element)), element);
            if (data.required) {
              param = data.required;
              delete data.required;
              data = $.extend({ required: param }, data);
            }
            if (data.remote) {
              param = data.remote;
              delete data.remote;
              data = $.extend(data, { remote: param });
            }
            return data;
          }
        });
        var trim = function(str) {
          return str.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "");
        };
        $.extend($.expr.pseudos || $.expr[":"], {
          blank: function(a) {
            return !trim("" + $(a).val());
          },
          filled: function(a) {
            var val = $(a).val();
            return val !== null && !!trim("" + val);
          },
          unchecked: function(a) {
            return !$(a).prop("checked");
          }
        });
        $.validator = function(options, form) {
          this.settings = $.extend(true, {}, $.validator.defaults, options);
          this.currentForm = form;
          this.init();
        };
        $.validator.format = function(source, params) {
          if (arguments.length === 1) {
            return function() {
              var args = $.makeArray(arguments);
              args.unshift(source);
              return $.validator.format.apply(this, args);
            };
          }
          if (params === void 0) {
            return source;
          }
          if (arguments.length > 2 && params.constructor !== Array) {
            params = $.makeArray(arguments).slice(1);
          }
          if (params.constructor !== Array) {
            params = [params];
          }
          $.each(params, function(i, n) {
            source = source.replace(new RegExp("\\{" + i + "\\}", "g"), function() {
              return n;
            });
          });
          return source;
        };
        $.extend($.validator, {
          defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            pendingClass: "pending",
            validClass: "valid",
            errorElement: "label",
            focusCleanup: false,
            focusInvalid: true,
            errorContainer: $([]),
            errorLabelContainer: $([]),
            onsubmit: true,
            ignore: ":hidden",
            ignoreTitle: false,
            onfocusin: function(element) {
              this.lastActive = element;
              if (this.settings.focusCleanup) {
                if (this.settings.unhighlight) {
                  this.settings.unhighlight.call(this, element, this.settings.errorClass, this.settings.validClass);
                }
                this.hideThese(this.errorsFor(element));
              }
            },
            onfocusout: function(element) {
              if (!this.checkable(element) && (element.name in this.submitted || !this.optional(element))) {
                this.element(element);
              }
            },
            onkeyup: function(element, event) {
              var excludedKeys = [
                16,
                17,
                18,
                20,
                35,
                36,
                37,
                38,
                39,
                40,
                45,
                144,
                225
              ];
              if (event.which === 9 && this.elementValue(element) === "" || $.inArray(event.keyCode, excludedKeys) !== -1) {
                return;
              } else if (element.name in this.submitted || element.name in this.invalid) {
                this.element(element);
              }
            },
            onclick: function(element) {
              if (element.name in this.submitted) {
                this.element(element);
              } else if (element.parentNode.name in this.submitted) {
                this.element(element.parentNode);
              }
            },
            highlight: function(element, errorClass, validClass) {
              if (element.type === "radio") {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
              } else {
                $(element).addClass(errorClass).removeClass(validClass);
              }
            },
            unhighlight: function(element, errorClass, validClass) {
              if (element.type === "radio") {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
              } else {
                $(element).removeClass(errorClass).addClass(validClass);
              }
            }
          },
          setDefaults: function(settings) {
            $.extend($.validator.defaults, settings);
          },
          messages: {
            required: "This field is required.",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            equalTo: "Please enter the same value again.",
            maxlength: $.validator.format("Please enter no more than {0} characters."),
            minlength: $.validator.format("Please enter at least {0} characters."),
            rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
            range: $.validator.format("Please enter a value between {0} and {1}."),
            max: $.validator.format("Please enter a value less than or equal to {0}."),
            min: $.validator.format("Please enter a value greater than or equal to {0}."),
            step: $.validator.format("Please enter a multiple of {0}.")
          },
          autoCreateRanges: false,
          prototype: {
            init: function() {
              this.labelContainer = $(this.settings.errorLabelContainer);
              this.errorContext = this.labelContainer.length && this.labelContainer || $(this.currentForm);
              this.containers = $(this.settings.errorContainer).add(this.settings.errorLabelContainer);
              this.submitted = {};
              this.valueCache = {};
              this.pendingRequest = 0;
              this.pending = {};
              this.invalid = {};
              this.reset();
              var currentForm = this.currentForm, groups = this.groups = {}, rules;
              $.each(this.settings.groups, function(key, value) {
                if (typeof value === "string") {
                  value = value.split(/\s/);
                }
                $.each(value, function(index, name) {
                  groups[name] = key;
                });
              });
              rules = this.settings.rules;
              $.each(rules, function(key, value) {
                rules[key] = $.validator.normalizeRule(value);
              });
              function delegate(event) {
                var isContentEditable = typeof $(this).attr("contenteditable") !== "undefined" && $(this).attr("contenteditable") !== "false";
                if (!this.form && isContentEditable) {
                  this.form = $(this).closest("form")[0];
                  this.name = $(this).attr("name");
                }
                if (currentForm !== this.form) {
                  return;
                }
                var validator = $.data(this.form, "validator"), eventType = "on" + event.type.replace(/^validate/, ""), settings = validator.settings;
                if (settings[eventType] && !$(this).is(settings.ignore)) {
                  settings[eventType].call(validator, this, event);
                }
              }
              $(this.currentForm).on("focusin.validate focusout.validate keyup.validate", ":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'], [type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox'], [contenteditable], [type='button']", delegate).on("click.validate", "select, option, [type='radio'], [type='checkbox']", delegate);
              if (this.settings.invalidHandler) {
                $(this.currentForm).on("invalid-form.validate", this.settings.invalidHandler);
              }
            },
            form: function() {
              this.checkForm();
              $.extend(this.submitted, this.errorMap);
              this.invalid = $.extend({}, this.errorMap);
              if (!this.valid()) {
                $(this.currentForm).triggerHandler("invalid-form", [this]);
              }
              this.showErrors();
              return this.valid();
            },
            checkForm: function() {
              this.prepareForm();
              for (var i = 0, elements = this.currentElements = this.elements(); elements[i]; i++) {
                this.check(elements[i]);
              }
              return this.valid();
            },
            element: function(element) {
              var cleanElement = this.clean(element), checkElement = this.validationTargetFor(cleanElement), v = this, result = true, rs, group;
              if (checkElement === void 0) {
                delete this.invalid[cleanElement.name];
              } else {
                this.prepareElement(checkElement);
                this.currentElements = $(checkElement);
                group = this.groups[checkElement.name];
                if (group) {
                  $.each(this.groups, function(name, testgroup) {
                    if (testgroup === group && name !== checkElement.name) {
                      cleanElement = v.validationTargetFor(v.clean(v.findByName(name)));
                      if (cleanElement && cleanElement.name in v.invalid) {
                        v.currentElements.push(cleanElement);
                        result = v.check(cleanElement) && result;
                      }
                    }
                  });
                }
                rs = this.check(checkElement) !== false;
                result = result && rs;
                if (rs) {
                  this.invalid[checkElement.name] = false;
                } else {
                  this.invalid[checkElement.name] = true;
                }
                if (!this.numberOfInvalids()) {
                  this.toHide = this.toHide.add(this.containers);
                }
                this.showErrors();
                $(element).attr("aria-invalid", !rs);
              }
              return result;
            },
            showErrors: function(errors) {
              if (errors) {
                var validator = this;
                $.extend(this.errorMap, errors);
                this.errorList = $.map(this.errorMap, function(message, name) {
                  return {
                    message,
                    element: validator.findByName(name)[0]
                  };
                });
                this.successList = $.grep(this.successList, function(element) {
                  return !(element.name in errors);
                });
              }
              if (this.settings.showErrors) {
                this.settings.showErrors.call(this, this.errorMap, this.errorList);
              } else {
                this.defaultShowErrors();
              }
            },
            resetForm: function() {
              if ($.fn.resetForm) {
                $(this.currentForm).resetForm();
              }
              this.invalid = {};
              this.submitted = {};
              this.prepareForm();
              this.hideErrors();
              var elements = this.elements().removeData("previousValue").removeAttr("aria-invalid");
              this.resetElements(elements);
            },
            resetElements: function(elements) {
              var i;
              if (this.settings.unhighlight) {
                for (i = 0; elements[i]; i++) {
                  this.settings.unhighlight.call(this, elements[i], this.settings.errorClass, "");
                  this.findByName(elements[i].name).removeClass(this.settings.validClass);
                }
              } else {
                elements.removeClass(this.settings.errorClass).removeClass(this.settings.validClass);
              }
            },
            numberOfInvalids: function() {
              return this.objectLength(this.invalid);
            },
            objectLength: function(obj) {
              var count = 0, i;
              for (i in obj) {
                if (obj[i] !== void 0 && obj[i] !== null && obj[i] !== false) {
                  count++;
                }
              }
              return count;
            },
            hideErrors: function() {
              this.hideThese(this.toHide);
            },
            hideThese: function(errors) {
              errors.not(this.containers).text("");
              this.addWrapper(errors).hide();
            },
            valid: function() {
              return this.size() === 0;
            },
            size: function() {
              return this.errorList.length;
            },
            focusInvalid: function() {
              if (this.settings.focusInvalid) {
                try {
                  $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").trigger("focus").trigger("focusin");
                } catch (e) {
                }
              }
            },
            findLastActive: function() {
              var lastActive = this.lastActive;
              return lastActive && $.grep(this.errorList, function(n) {
                return n.element.name === lastActive.name;
              }).length === 1 && lastActive;
            },
            elements: function() {
              var validator = this, rulesCache = {};
              return $(this.currentForm).find("input, select, textarea, [contenteditable]").not(":submit, :reset, :image, :disabled").not(this.settings.ignore).filter(function() {
                var name = this.name || $(this).attr("name");
                var isContentEditable = typeof $(this).attr("contenteditable") !== "undefined" && $(this).attr("contenteditable") !== "false";
                if (!name && validator.settings.debug && window.console) {
                  console.error("%o has no name assigned", this);
                }
                if (isContentEditable) {
                  this.form = $(this).closest("form")[0];
                  this.name = name;
                }
                if (this.form !== validator.currentForm) {
                  return false;
                }
                if (name in rulesCache || !validator.objectLength($(this).rules())) {
                  return false;
                }
                rulesCache[name] = true;
                return true;
              });
            },
            clean: function(selector) {
              return $(selector)[0];
            },
            errors: function() {
              var errorClass = this.settings.errorClass.split(" ").join(".");
              return $(this.settings.errorElement + "." + errorClass, this.errorContext);
            },
            resetInternals: function() {
              this.successList = [];
              this.errorList = [];
              this.errorMap = {};
              this.toShow = $([]);
              this.toHide = $([]);
            },
            reset: function() {
              this.resetInternals();
              this.currentElements = $([]);
            },
            prepareForm: function() {
              this.reset();
              this.toHide = this.errors().add(this.containers);
            },
            prepareElement: function(element) {
              this.reset();
              this.toHide = this.errorsFor(element);
            },
            elementValue: function(element) {
              var $element = $(element), type = element.type, isContentEditable = typeof $element.attr("contenteditable") !== "undefined" && $element.attr("contenteditable") !== "false", val, idx;
              if (type === "radio" || type === "checkbox") {
                return this.findByName(element.name).filter(":checked").val();
              } else if (type === "number" && typeof element.validity !== "undefined") {
                return element.validity.badInput ? "NaN" : $element.val();
              }
              if (isContentEditable) {
                val = $element.text();
              } else {
                val = $element.val();
              }
              if (type === "file") {
                if (val.substr(0, 12) === "C:\\fakepath\\") {
                  return val.substr(12);
                }
                idx = val.lastIndexOf("/");
                if (idx >= 0) {
                  return val.substr(idx + 1);
                }
                idx = val.lastIndexOf("\\");
                if (idx >= 0) {
                  return val.substr(idx + 1);
                }
                return val;
              }
              if (typeof val === "string") {
                return val.replace(/\r/g, "");
              }
              return val;
            },
            check: function(element) {
              element = this.validationTargetFor(this.clean(element));
              var rules = $(element).rules(), rulesCount = $.map(rules, function(n, i) {
                return i;
              }).length, dependencyMismatch = false, val = this.elementValue(element), result, method, rule, normalizer;
              if (typeof rules.normalizer === "function") {
                normalizer = rules.normalizer;
              } else if (typeof this.settings.normalizer === "function") {
                normalizer = this.settings.normalizer;
              }
              if (normalizer) {
                val = normalizer.call(element, val);
                delete rules.normalizer;
              }
              for (method in rules) {
                rule = { method, parameters: rules[method] };
                try {
                  result = $.validator.methods[method].call(this, val, element, rule.parameters);
                  if (result === "dependency-mismatch" && rulesCount === 1) {
                    dependencyMismatch = true;
                    continue;
                  }
                  dependencyMismatch = false;
                  if (result === "pending") {
                    this.toHide = this.toHide.not(this.errorsFor(element));
                    return;
                  }
                  if (!result) {
                    this.formatAndAdd(element, rule);
                    return false;
                  }
                } catch (e) {
                  if (this.settings.debug && window.console) {
                    console.log("Exception occurred when checking element " + element.id + ", check the '" + rule.method + "' method.", e);
                  }
                  if (e instanceof TypeError) {
                    e.message += ".  Exception occurred when checking element " + element.id + ", check the '" + rule.method + "' method.";
                  }
                  throw e;
                }
              }
              if (dependencyMismatch) {
                return;
              }
              if (this.objectLength(rules)) {
                this.successList.push(element);
              }
              return true;
            },
            customDataMessage: function(element, method) {
              return $(element).data("msg" + method.charAt(0).toUpperCase() + method.substring(1).toLowerCase()) || $(element).data("msg");
            },
            customMessage: function(name, method) {
              var m = this.settings.messages[name];
              return m && (m.constructor === String ? m : m[method]);
            },
            findDefined: function() {
              for (var i = 0; i < arguments.length; i++) {
                if (arguments[i] !== void 0) {
                  return arguments[i];
                }
              }
              return void 0;
            },
            defaultMessage: function(element, rule) {
              if (typeof rule === "string") {
                rule = { method: rule };
              }
              var message = this.findDefined(this.customMessage(element.name, rule.method), this.customDataMessage(element, rule.method), !this.settings.ignoreTitle && element.title || void 0, $.validator.messages[rule.method], "<strong>Warning: No message defined for " + element.name + "</strong>"), theregex = /\$?\{(\d+)\}/g;
              if (typeof message === "function") {
                message = message.call(this, rule.parameters, element);
              } else if (theregex.test(message)) {
                message = $.validator.format(message.replace(theregex, "{$1}"), rule.parameters);
              }
              return message;
            },
            formatAndAdd: function(element, rule) {
              var message = this.defaultMessage(element, rule);
              this.errorList.push({
                message,
                element,
                method: rule.method
              });
              this.errorMap[element.name] = message;
              this.submitted[element.name] = message;
            },
            addWrapper: function(toToggle) {
              if (this.settings.wrapper) {
                toToggle = toToggle.add(toToggle.parent(this.settings.wrapper));
              }
              return toToggle;
            },
            defaultShowErrors: function() {
              var i, elements, error;
              for (i = 0; this.errorList[i]; i++) {
                error = this.errorList[i];
                if (this.settings.highlight) {
                  this.settings.highlight.call(this, error.element, this.settings.errorClass, this.settings.validClass);
                }
                this.showLabel(error.element, error.message);
              }
              if (this.errorList.length) {
                this.toShow = this.toShow.add(this.containers);
              }
              if (this.settings.success) {
                for (i = 0; this.successList[i]; i++) {
                  this.showLabel(this.successList[i]);
                }
              }
              if (this.settings.unhighlight) {
                for (i = 0, elements = this.validElements(); elements[i]; i++) {
                  this.settings.unhighlight.call(this, elements[i], this.settings.errorClass, this.settings.validClass);
                }
              }
              this.toHide = this.toHide.not(this.toShow);
              this.hideErrors();
              this.addWrapper(this.toShow).show();
            },
            validElements: function() {
              return this.currentElements.not(this.invalidElements());
            },
            invalidElements: function() {
              return $(this.errorList).map(function() {
                return this.element;
              });
            },
            showLabel: function(element, message) {
              var place, group, errorID, v, error = this.errorsFor(element), elementID = this.idOrName(element), describedBy = $(element).attr("aria-describedby");
              if (error.length) {
                error.removeClass(this.settings.validClass).addClass(this.settings.errorClass);
                error.html(message);
              } else {
                error = $("<" + this.settings.errorElement + ">").attr("id", elementID + "-error").addClass(this.settings.errorClass).html(message || "");
                place = error;
                if (this.settings.wrapper) {
                  place = error.hide().show().wrap("<" + this.settings.wrapper + "/>").parent();
                }
                if (this.labelContainer.length) {
                  this.labelContainer.append(place);
                } else if (this.settings.errorPlacement) {
                  this.settings.errorPlacement.call(this, place, $(element));
                } else {
                  place.insertAfter(element);
                }
                if (error.is("label")) {
                  error.attr("for", elementID);
                } else if (error.parents("label[for='" + this.escapeCssMeta(elementID) + "']").length === 0) {
                  errorID = error.attr("id");
                  if (!describedBy) {
                    describedBy = errorID;
                  } else if (!describedBy.match(new RegExp("\\b" + this.escapeCssMeta(errorID) + "\\b"))) {
                    describedBy += " " + errorID;
                  }
                  $(element).attr("aria-describedby", describedBy);
                  group = this.groups[element.name];
                  if (group) {
                    v = this;
                    $.each(v.groups, function(name, testgroup) {
                      if (testgroup === group) {
                        $("[name='" + v.escapeCssMeta(name) + "']", v.currentForm).attr("aria-describedby", error.attr("id"));
                      }
                    });
                  }
                }
              }
              if (!message && this.settings.success) {
                error.text("");
                if (typeof this.settings.success === "string") {
                  error.addClass(this.settings.success);
                } else {
                  this.settings.success(error, element);
                }
              }
              this.toShow = this.toShow.add(error);
            },
            errorsFor: function(element) {
              var name = this.escapeCssMeta(this.idOrName(element)), describer = $(element).attr("aria-describedby"), selector = "label[for='" + name + "'], label[for='" + name + "'] *";
              if (describer) {
                selector = selector + ", #" + this.escapeCssMeta(describer).replace(/\s+/g, ", #");
              }
              return this.errors().filter(selector);
            },
            escapeCssMeta: function(string) {
              if (string === void 0) {
                return "";
              }
              return string.replace(/([\\!"#$%&'()*+,./:;<=>?@\[\]^`{|}~])/g, "\\$1");
            },
            idOrName: function(element) {
              return this.groups[element.name] || (this.checkable(element) ? element.name : element.id || element.name);
            },
            validationTargetFor: function(element) {
              if (this.checkable(element)) {
                element = this.findByName(element.name);
              }
              return $(element).not(this.settings.ignore)[0];
            },
            checkable: function(element) {
              return /radio|checkbox/i.test(element.type);
            },
            findByName: function(name) {
              return $(this.currentForm).find("[name='" + this.escapeCssMeta(name) + "']");
            },
            getLength: function(value, element) {
              switch (element.nodeName.toLowerCase()) {
                case "select":
                  return $("option:selected", element).length;
                case "input":
                  if (this.checkable(element)) {
                    return this.findByName(element.name).filter(":checked").length;
                  }
              }
              return value.length;
            },
            depend: function(param, element) {
              return this.dependTypes[typeof param] ? this.dependTypes[typeof param](param, element) : true;
            },
            dependTypes: {
              "boolean": function(param) {
                return param;
              },
              "string": function(param, element) {
                return !!$(param, element.form).length;
              },
              "function": function(param, element) {
                return param(element);
              }
            },
            optional: function(element) {
              var val = this.elementValue(element);
              return !$.validator.methods.required.call(this, val, element) && "dependency-mismatch";
            },
            startRequest: function(element) {
              if (!this.pending[element.name]) {
                this.pendingRequest++;
                $(element).addClass(this.settings.pendingClass);
                this.pending[element.name] = true;
              }
            },
            stopRequest: function(element, valid) {
              this.pendingRequest--;
              if (this.pendingRequest < 0) {
                this.pendingRequest = 0;
              }
              delete this.pending[element.name];
              $(element).removeClass(this.settings.pendingClass);
              if (valid && this.pendingRequest === 0 && this.formSubmitted && this.form() && this.pendingRequest === 0) {
                $(this.currentForm).submit();
                if (this.submitButton) {
                  $("input:hidden[name='" + this.submitButton.name + "']", this.currentForm).remove();
                }
                this.formSubmitted = false;
              } else if (!valid && this.pendingRequest === 0 && this.formSubmitted) {
                $(this.currentForm).triggerHandler("invalid-form", [this]);
                this.formSubmitted = false;
              }
            },
            previousValue: function(element, method) {
              method = typeof method === "string" && method || "remote";
              return $.data(element, "previousValue") || $.data(element, "previousValue", {
                old: null,
                valid: true,
                message: this.defaultMessage(element, { method })
              });
            },
            destroy: function() {
              this.resetForm();
              $(this.currentForm).off(".validate").removeData("validator").find(".validate-equalTo-blur").off(".validate-equalTo").removeClass("validate-equalTo-blur").find(".validate-lessThan-blur").off(".validate-lessThan").removeClass("validate-lessThan-blur").find(".validate-lessThanEqual-blur").off(".validate-lessThanEqual").removeClass("validate-lessThanEqual-blur").find(".validate-greaterThanEqual-blur").off(".validate-greaterThanEqual").removeClass("validate-greaterThanEqual-blur").find(".validate-greaterThan-blur").off(".validate-greaterThan").removeClass("validate-greaterThan-blur");
            }
          },
          classRuleSettings: {
            required: { required: true },
            email: { email: true },
            url: { url: true },
            date: { date: true },
            dateISO: { dateISO: true },
            number: { number: true },
            digits: { digits: true },
            creditcard: { creditcard: true }
          },
          addClassRules: function(className, rules) {
            if (className.constructor === String) {
              this.classRuleSettings[className] = rules;
            } else {
              $.extend(this.classRuleSettings, className);
            }
          },
          classRules: function(element) {
            var rules = {}, classes = $(element).attr("class");
            if (classes) {
              $.each(classes.split(" "), function() {
                if (this in $.validator.classRuleSettings) {
                  $.extend(rules, $.validator.classRuleSettings[this]);
                }
              });
            }
            return rules;
          },
          normalizeAttributeRule: function(rules, type, method, value) {
            if (/min|max|step/.test(method) && (type === null || /number|range|text/.test(type))) {
              value = Number(value);
              if (isNaN(value)) {
                value = void 0;
              }
            }
            if (value || value === 0) {
              rules[method] = value;
            } else if (type === method && type !== "range") {
              rules[type === "date" ? "dateISO" : method] = true;
            }
          },
          attributeRules: function(element) {
            var rules = {}, $element = $(element), type = element.getAttribute("type"), method, value;
            for (method in $.validator.methods) {
              if (method === "required") {
                value = element.getAttribute(method);
                if (value === "") {
                  value = true;
                }
                value = !!value;
              } else {
                value = $element.attr(method);
              }
              this.normalizeAttributeRule(rules, type, method, value);
            }
            if (rules.maxlength && /-1|2147483647|524288/.test(rules.maxlength)) {
              delete rules.maxlength;
            }
            return rules;
          },
          dataRules: function(element) {
            var rules = {}, $element = $(element), type = element.getAttribute("type"), method, value;
            for (method in $.validator.methods) {
              value = $element.data("rule" + method.charAt(0).toUpperCase() + method.substring(1).toLowerCase());
              if (value === "") {
                value = true;
              }
              this.normalizeAttributeRule(rules, type, method, value);
            }
            return rules;
          },
          staticRules: function(element) {
            var rules = {}, validator = $.data(element.form, "validator");
            if (validator.settings.rules) {
              rules = $.validator.normalizeRule(validator.settings.rules[element.name]) || {};
            }
            return rules;
          },
          normalizeRules: function(rules, element) {
            $.each(rules, function(prop, val) {
              if (val === false) {
                delete rules[prop];
                return;
              }
              if (val.param || val.depends) {
                var keepRule = true;
                switch (typeof val.depends) {
                  case "string":
                    keepRule = !!$(val.depends, element.form).length;
                    break;
                  case "function":
                    keepRule = val.depends.call(element, element);
                    break;
                }
                if (keepRule) {
                  rules[prop] = val.param !== void 0 ? val.param : true;
                } else {
                  $.data(element.form, "validator").resetElements($(element));
                  delete rules[prop];
                }
              }
            });
            $.each(rules, function(rule, parameter) {
              rules[rule] = typeof parameter === "function" && rule !== "normalizer" ? parameter(element) : parameter;
            });
            $.each(["minlength", "maxlength"], function() {
              if (rules[this]) {
                rules[this] = Number(rules[this]);
              }
            });
            $.each(["rangelength", "range"], function() {
              var parts;
              if (rules[this]) {
                if (Array.isArray(rules[this])) {
                  rules[this] = [Number(rules[this][0]), Number(rules[this][1])];
                } else if (typeof rules[this] === "string") {
                  parts = rules[this].replace(/[\[\]]/g, "").split(/[\s,]+/);
                  rules[this] = [Number(parts[0]), Number(parts[1])];
                }
              }
            });
            if ($.validator.autoCreateRanges) {
              if (rules.min != null && rules.max != null) {
                rules.range = [rules.min, rules.max];
                delete rules.min;
                delete rules.max;
              }
              if (rules.minlength != null && rules.maxlength != null) {
                rules.rangelength = [rules.minlength, rules.maxlength];
                delete rules.minlength;
                delete rules.maxlength;
              }
            }
            return rules;
          },
          normalizeRule: function(data) {
            if (typeof data === "string") {
              var transformed = {};
              $.each(data.split(/\s/), function() {
                transformed[this] = true;
              });
              data = transformed;
            }
            return data;
          },
          addMethod: function(name, method, message) {
            $.validator.methods[name] = method;
            $.validator.messages[name] = message !== void 0 ? message : $.validator.messages[name];
            if (method.length < 3) {
              $.validator.addClassRules(name, $.validator.normalizeRule(name));
            }
          },
          methods: {
            required: function(value, element, param) {
              if (!this.depend(param, element)) {
                return "dependency-mismatch";
              }
              if (element.nodeName.toLowerCase() === "select") {
                var val = $(element).val();
                return val && val.length > 0;
              }
              if (this.checkable(element)) {
                return this.getLength(value, element) > 0;
              }
              return value !== void 0 && value !== null && value.length > 0;
            },
            email: function(value, element) {
              return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(value);
            },
            url: function(value, element) {
              return this.optional(element) || /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z0-9\u00a1-\uffff][a-z0-9\u00a1-\uffff_-]{0,62})?[a-z0-9\u00a1-\uffff]\.)+(?:[a-z\u00a1-\uffff]{2,}\.?))(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(value);
            },
            date: function() {
              var called = false;
              return function(value, element) {
                if (!called) {
                  called = true;
                  if (this.settings.debug && window.console) {
                    console.warn("The `date` method is deprecated and will be removed in version '2.0.0'.\nPlease don't use it, since it relies on the Date constructor, which\nbehaves very differently across browsers and locales. Use `dateISO`\ninstead or one of the locale specific methods in `localizations/`\nand `additional-methods.js`.");
                  }
                }
                return this.optional(element) || !/Invalid|NaN/.test(new Date(value).toString());
              };
            }(),
            dateISO: function(value, element) {
              return this.optional(element) || /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(value);
            },
            number: function(value, element) {
              return this.optional(element) || /^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(value);
            },
            digits: function(value, element) {
              return this.optional(element) || /^\d+$/.test(value);
            },
            minlength: function(value, element, param) {
              var length = Array.isArray(value) ? value.length : this.getLength(value, element);
              return this.optional(element) || length >= param;
            },
            maxlength: function(value, element, param) {
              var length = Array.isArray(value) ? value.length : this.getLength(value, element);
              return this.optional(element) || length <= param;
            },
            rangelength: function(value, element, param) {
              var length = Array.isArray(value) ? value.length : this.getLength(value, element);
              return this.optional(element) || length >= param[0] && length <= param[1];
            },
            min: function(value, element, param) {
              return this.optional(element) || value >= param;
            },
            max: function(value, element, param) {
              return this.optional(element) || value <= param;
            },
            range: function(value, element, param) {
              return this.optional(element) || value >= param[0] && value <= param[1];
            },
            step: function(value, element, param) {
              var type = $(element).attr("type"), errorMessage = "Step attribute on input type " + type + " is not supported.", supportedTypes = ["text", "number", "range"], re = new RegExp("\\b" + type + "\\b"), notSupported = type && !re.test(supportedTypes.join()), decimalPlaces = function(num) {
                var match = ("" + num).match(/(?:\.(\d+))?$/);
                if (!match) {
                  return 0;
                }
                return match[1] ? match[1].length : 0;
              }, toInt = function(num) {
                return Math.round(num * Math.pow(10, decimals));
              }, valid = true, decimals;
              if (notSupported) {
                throw new Error(errorMessage);
              }
              decimals = decimalPlaces(param);
              if (decimalPlaces(value) > decimals || toInt(value) % toInt(param) !== 0) {
                valid = false;
              }
              return this.optional(element) || valid;
            },
            equalTo: function(value, element, param) {
              var target = $(param);
              if (this.settings.onfocusout && target.not(".validate-equalTo-blur").length) {
                target.addClass("validate-equalTo-blur").on("blur.validate-equalTo", function() {
                  $(element).valid();
                });
              }
              return value === target.val();
            },
            remote: function(value, element, param, method) {
              if (this.optional(element)) {
                return "dependency-mismatch";
              }
              method = typeof method === "string" && method || "remote";
              var previous = this.previousValue(element, method), validator, data, optionDataString;
              if (!this.settings.messages[element.name]) {
                this.settings.messages[element.name] = {};
              }
              previous.originalMessage = previous.originalMessage || this.settings.messages[element.name][method];
              this.settings.messages[element.name][method] = previous.message;
              param = typeof param === "string" && { url: param } || param;
              optionDataString = $.param($.extend({ data: value }, param.data));
              if (previous.old === optionDataString) {
                return previous.valid;
              }
              previous.old = optionDataString;
              validator = this;
              this.startRequest(element);
              data = {};
              data[element.name] = value;
              $.ajax($.extend(true, {
                mode: "abort",
                port: "validate" + element.name,
                dataType: "json",
                data,
                context: validator.currentForm,
                success: function(response) {
                  var valid = response === true || response === "true", errors, message, submitted;
                  validator.settings.messages[element.name][method] = previous.originalMessage;
                  if (valid) {
                    submitted = validator.formSubmitted;
                    validator.resetInternals();
                    validator.toHide = validator.errorsFor(element);
                    validator.formSubmitted = submitted;
                    validator.successList.push(element);
                    validator.invalid[element.name] = false;
                    validator.showErrors();
                  } else {
                    errors = {};
                    message = response || validator.defaultMessage(element, { method, parameters: value });
                    errors[element.name] = previous.message = message;
                    validator.invalid[element.name] = true;
                    validator.showErrors(errors);
                  }
                  previous.valid = valid;
                  validator.stopRequest(element, valid);
                }
              }, param));
              return "pending";
            }
          }
        });
        var pendingRequests = {}, ajax;
        if ($.ajaxPrefilter) {
          $.ajaxPrefilter(function(settings, _, xhr) {
            var port = settings.port;
            if (settings.mode === "abort") {
              if (pendingRequests[port]) {
                pendingRequests[port].abort();
              }
              pendingRequests[port] = xhr;
            }
          });
        } else {
          ajax = $.ajax;
          $.ajax = function(settings) {
            var mode = ("mode" in settings ? settings : $.ajaxSettings).mode, port = ("port" in settings ? settings : $.ajaxSettings).port;
            if (mode === "abort") {
              if (pendingRequests[port]) {
                pendingRequests[port].abort();
              }
              pendingRequests[port] = ajax.apply(this, arguments);
              return pendingRequests[port];
            }
            return ajax.apply(this, arguments);
          };
        }
        return $;
      });
    }
  });

  // node_modules/sweetalert2/dist/sweetalert2.all.js
  var require_sweetalert2_all = __commonJS({
    "node_modules/sweetalert2/dist/sweetalert2.all.js"(exports, module) {
      (function(global, factory) {
        typeof exports === "object" && typeof module !== "undefined" ? module.exports = factory() : typeof define === "function" && define.amd ? define(factory) : (global = global || self, global.Sweetalert2 = factory());
      })(exports, function() {
        "use strict";
        const consolePrefix = "SweetAlert2:";
        const uniqueArray = (arr) => {
          const result = [];
          for (let i = 0; i < arr.length; i++) {
            if (result.indexOf(arr[i]) === -1) {
              result.push(arr[i]);
            }
          }
          return result;
        };
        const capitalizeFirstLetter = (str) => str.charAt(0).toUpperCase() + str.slice(1);
        const toArray = (nodeList) => Array.prototype.slice.call(nodeList);
        const warn = (message) => {
          console.warn("".concat(consolePrefix, " ").concat(typeof message === "object" ? message.join(" ") : message));
        };
        const error = (message) => {
          console.error("".concat(consolePrefix, " ").concat(message));
        };
        const previousWarnOnceMessages = [];
        const warnOnce = (message) => {
          if (!previousWarnOnceMessages.includes(message)) {
            previousWarnOnceMessages.push(message);
            warn(message);
          }
        };
        const warnAboutDeprecation = (deprecatedParam, useInstead) => {
          warnOnce('"'.concat(deprecatedParam, '" is deprecated and will be removed in the next major release. Please use "').concat(useInstead, '" instead.'));
        };
        const callIfFunction = (arg) => typeof arg === "function" ? arg() : arg;
        const hasToPromiseFn = (arg) => arg && typeof arg.toPromise === "function";
        const asPromise = (arg) => hasToPromiseFn(arg) ? arg.toPromise() : Promise.resolve(arg);
        const isPromise = (arg) => arg && Promise.resolve(arg) === arg;
        const getRandomElement = (arr) => arr[Math.floor(Math.random() * arr.length)];
        const defaultParams = {
          title: "",
          titleText: "",
          text: "",
          html: "",
          footer: "",
          icon: void 0,
          iconColor: void 0,
          iconHtml: void 0,
          template: void 0,
          toast: false,
          showClass: {
            popup: "swal2-show",
            backdrop: "swal2-backdrop-show",
            icon: "swal2-icon-show"
          },
          hideClass: {
            popup: "swal2-hide",
            backdrop: "swal2-backdrop-hide",
            icon: "swal2-icon-hide"
          },
          customClass: {},
          target: "body",
          color: void 0,
          backdrop: true,
          heightAuto: true,
          allowOutsideClick: true,
          allowEscapeKey: true,
          allowEnterKey: true,
          stopKeydownPropagation: true,
          keydownListenerCapture: false,
          showConfirmButton: true,
          showDenyButton: false,
          showCancelButton: false,
          preConfirm: void 0,
          preDeny: void 0,
          confirmButtonText: "OK",
          confirmButtonAriaLabel: "",
          confirmButtonColor: void 0,
          denyButtonText: "No",
          denyButtonAriaLabel: "",
          denyButtonColor: void 0,
          cancelButtonText: "Cancel",
          cancelButtonAriaLabel: "",
          cancelButtonColor: void 0,
          buttonsStyling: true,
          reverseButtons: false,
          focusConfirm: true,
          focusDeny: false,
          focusCancel: false,
          returnFocus: true,
          showCloseButton: false,
          closeButtonHtml: "&times;",
          closeButtonAriaLabel: "Close this dialog",
          loaderHtml: "",
          showLoaderOnConfirm: false,
          showLoaderOnDeny: false,
          imageUrl: void 0,
          imageWidth: void 0,
          imageHeight: void 0,
          imageAlt: "",
          timer: void 0,
          timerProgressBar: false,
          width: void 0,
          padding: void 0,
          background: void 0,
          input: void 0,
          inputPlaceholder: "",
          inputLabel: "",
          inputValue: "",
          inputOptions: {},
          inputAutoTrim: true,
          inputAttributes: {},
          inputValidator: void 0,
          returnInputValueOnDeny: false,
          validationMessage: void 0,
          grow: false,
          position: "center",
          progressSteps: [],
          currentProgressStep: void 0,
          progressStepsDistance: void 0,
          willOpen: void 0,
          didOpen: void 0,
          didRender: void 0,
          willClose: void 0,
          didClose: void 0,
          didDestroy: void 0,
          scrollbarPadding: true
        };
        const updatableParams = ["allowEscapeKey", "allowOutsideClick", "background", "buttonsStyling", "cancelButtonAriaLabel", "cancelButtonColor", "cancelButtonText", "closeButtonAriaLabel", "closeButtonHtml", "color", "confirmButtonAriaLabel", "confirmButtonColor", "confirmButtonText", "currentProgressStep", "customClass", "denyButtonAriaLabel", "denyButtonColor", "denyButtonText", "didClose", "didDestroy", "footer", "hideClass", "html", "icon", "iconColor", "iconHtml", "imageAlt", "imageHeight", "imageUrl", "imageWidth", "preConfirm", "preDeny", "progressSteps", "returnFocus", "reverseButtons", "showCancelButton", "showCloseButton", "showConfirmButton", "showDenyButton", "text", "title", "titleText", "willClose"];
        const deprecatedParams = {};
        const toastIncompatibleParams = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusDeny", "focusCancel", "returnFocus", "heightAuto", "keydownListenerCapture"];
        const isValidParameter = (paramName) => {
          return Object.prototype.hasOwnProperty.call(defaultParams, paramName);
        };
        const isUpdatableParameter = (paramName) => {
          return updatableParams.indexOf(paramName) !== -1;
        };
        const isDeprecatedParameter = (paramName) => {
          return deprecatedParams[paramName];
        };
        const checkIfParamIsValid = (param) => {
          if (!isValidParameter(param)) {
            warn('Unknown parameter "'.concat(param, '"'));
          }
        };
        const checkIfToastParamIsValid = (param) => {
          if (toastIncompatibleParams.includes(param)) {
            warn('The parameter "'.concat(param, '" is incompatible with toasts'));
          }
        };
        const checkIfParamIsDeprecated = (param) => {
          if (isDeprecatedParameter(param)) {
            warnAboutDeprecation(param, isDeprecatedParameter(param));
          }
        };
        const showWarningsForParams = (params) => {
          if (!params.backdrop && params.allowOutsideClick) {
            warn('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`');
          }
          for (const param in params) {
            checkIfParamIsValid(param);
            if (params.toast) {
              checkIfToastParamIsValid(param);
            }
            checkIfParamIsDeprecated(param);
          }
        };
        const swalPrefix = "swal2-";
        const prefix = (items) => {
          const result = {};
          for (const i in items) {
            result[items[i]] = swalPrefix + items[i];
          }
          return result;
        };
        const swalClasses = prefix(["container", "shown", "height-auto", "iosfix", "popup", "modal", "no-backdrop", "no-transition", "toast", "toast-shown", "show", "hide", "close", "title", "html-container", "actions", "confirm", "deny", "cancel", "default-outline", "footer", "icon", "icon-content", "image", "input", "file", "range", "select", "radio", "checkbox", "label", "textarea", "inputerror", "input-label", "validation-message", "progress-steps", "active-progress-step", "progress-step", "progress-step-line", "loader", "loading", "styled", "top", "top-start", "top-end", "top-left", "top-right", "center", "center-start", "center-end", "center-left", "center-right", "bottom", "bottom-start", "bottom-end", "bottom-left", "bottom-right", "grow-row", "grow-column", "grow-fullscreen", "rtl", "timer-progress-bar", "timer-progress-bar-container", "scrollbar-measure", "icon-success", "icon-warning", "icon-info", "icon-question", "icon-error", "no-war"]);
        const iconTypes = prefix(["success", "warning", "info", "question", "error"]);
        const getContainer = () => document.body.querySelector(".".concat(swalClasses.container));
        const elementBySelector = (selectorString) => {
          const container = getContainer();
          return container ? container.querySelector(selectorString) : null;
        };
        const elementByClass = (className) => {
          return elementBySelector(".".concat(className));
        };
        const getPopup = () => elementByClass(swalClasses.popup);
        const getIcon = () => elementByClass(swalClasses.icon);
        const getTitle = () => elementByClass(swalClasses.title);
        const getHtmlContainer = () => elementByClass(swalClasses["html-container"]);
        const getImage = () => elementByClass(swalClasses.image);
        const getProgressSteps = () => elementByClass(swalClasses["progress-steps"]);
        const getValidationMessage = () => elementByClass(swalClasses["validation-message"]);
        const getConfirmButton = () => elementBySelector(".".concat(swalClasses.actions, " .").concat(swalClasses.confirm));
        const getDenyButton = () => elementBySelector(".".concat(swalClasses.actions, " .").concat(swalClasses.deny));
        const getInputLabel = () => elementByClass(swalClasses["input-label"]);
        const getLoader = () => elementBySelector(".".concat(swalClasses.loader));
        const getCancelButton = () => elementBySelector(".".concat(swalClasses.actions, " .").concat(swalClasses.cancel));
        const getActions = () => elementByClass(swalClasses.actions);
        const getFooter = () => elementByClass(swalClasses.footer);
        const getTimerProgressBar = () => elementByClass(swalClasses["timer-progress-bar"]);
        const getCloseButton = () => elementByClass(swalClasses.close);
        const focusable = '\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n';
        const getFocusableElements = () => {
          const focusableElementsWithTabindex = toArray(getPopup().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort((a, b) => {
            const tabindexA = parseInt(a.getAttribute("tabindex"));
            const tabindexB = parseInt(b.getAttribute("tabindex"));
            if (tabindexA > tabindexB) {
              return 1;
            } else if (tabindexA < tabindexB) {
              return -1;
            }
            return 0;
          });
          const otherFocusableElements = toArray(getPopup().querySelectorAll(focusable)).filter((el) => el.getAttribute("tabindex") !== "-1");
          return uniqueArray(focusableElementsWithTabindex.concat(otherFocusableElements)).filter((el) => isVisible(el));
        };
        const isModal = () => {
          return hasClass(document.body, swalClasses.shown) && !hasClass(document.body, swalClasses["toast-shown"]) && !hasClass(document.body, swalClasses["no-backdrop"]);
        };
        const isToast = () => {
          return getPopup() && hasClass(getPopup(), swalClasses.toast);
        };
        const isLoading = () => {
          return getPopup().hasAttribute("data-loading");
        };
        const states = {
          previousBodyPadding: null
        };
        const setInnerHtml = (elem, html) => {
          elem.textContent = "";
          if (html) {
            const parser = new DOMParser();
            const parsed = parser.parseFromString(html, "text/html");
            toArray(parsed.querySelector("head").childNodes).forEach((child) => {
              elem.appendChild(child);
            });
            toArray(parsed.querySelector("body").childNodes).forEach((child) => {
              elem.appendChild(child);
            });
          }
        };
        const hasClass = (elem, className) => {
          if (!className) {
            return false;
          }
          const classList = className.split(/\s+/);
          for (let i = 0; i < classList.length; i++) {
            if (!elem.classList.contains(classList[i])) {
              return false;
            }
          }
          return true;
        };
        const removeCustomClasses = (elem, params) => {
          toArray(elem.classList).forEach((className) => {
            if (!Object.values(swalClasses).includes(className) && !Object.values(iconTypes).includes(className) && !Object.values(params.showClass).includes(className)) {
              elem.classList.remove(className);
            }
          });
        };
        const applyCustomClass = (elem, params, className) => {
          removeCustomClasses(elem, params);
          if (params.customClass && params.customClass[className]) {
            if (typeof params.customClass[className] !== "string" && !params.customClass[className].forEach) {
              return warn("Invalid type of customClass.".concat(className, '! Expected string or iterable object, got "').concat(typeof params.customClass[className], '"'));
            }
            addClass(elem, params.customClass[className]);
          }
        };
        const getInput = (popup, inputClass) => {
          if (!inputClass) {
            return null;
          }
          switch (inputClass) {
            case "select":
            case "textarea":
            case "file":
              return popup.querySelector(".".concat(swalClasses.popup, " > .").concat(swalClasses[inputClass]));
            case "checkbox":
              return popup.querySelector(".".concat(swalClasses.popup, " > .").concat(swalClasses.checkbox, " input"));
            case "radio":
              return popup.querySelector(".".concat(swalClasses.popup, " > .").concat(swalClasses.radio, " input:checked")) || popup.querySelector(".".concat(swalClasses.popup, " > .").concat(swalClasses.radio, " input:first-child"));
            case "range":
              return popup.querySelector(".".concat(swalClasses.popup, " > .").concat(swalClasses.range, " input"));
            default:
              return popup.querySelector(".".concat(swalClasses.popup, " > .").concat(swalClasses.input));
          }
        };
        const focusInput = (input) => {
          input.focus();
          if (input.type !== "file") {
            const val = input.value;
            input.value = "";
            input.value = val;
          }
        };
        const toggleClass = (target, classList, condition) => {
          if (!target || !classList) {
            return;
          }
          if (typeof classList === "string") {
            classList = classList.split(/\s+/).filter(Boolean);
          }
          classList.forEach((className) => {
            if (Array.isArray(target)) {
              target.forEach((elem) => {
                condition ? elem.classList.add(className) : elem.classList.remove(className);
              });
            } else {
              condition ? target.classList.add(className) : target.classList.remove(className);
            }
          });
        };
        const addClass = (target, classList) => {
          toggleClass(target, classList, true);
        };
        const removeClass = (target, classList) => {
          toggleClass(target, classList, false);
        };
        const getDirectChildByClass = (elem, className) => {
          const childNodes = toArray(elem.childNodes);
          for (let i = 0; i < childNodes.length; i++) {
            if (hasClass(childNodes[i], className)) {
              return childNodes[i];
            }
          }
        };
        const applyNumericalStyle = (elem, property, value) => {
          if (value === "".concat(parseInt(value))) {
            value = parseInt(value);
          }
          if (value || parseInt(value) === 0) {
            elem.style[property] = typeof value === "number" ? "".concat(value, "px") : value;
          } else {
            elem.style.removeProperty(property);
          }
        };
        const show = function(elem) {
          let display = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : "flex";
          elem.style.display = display;
        };
        const hide = (elem) => {
          elem.style.display = "none";
        };
        const setStyle = (parent, selector, property, value) => {
          const el = parent.querySelector(selector);
          if (el) {
            el.style[property] = value;
          }
        };
        const toggle = function(elem, condition) {
          let display = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : "flex";
          condition ? show(elem, display) : hide(elem);
        };
        const isVisible = (elem) => !!(elem && (elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length));
        const allButtonsAreHidden = () => !isVisible(getConfirmButton()) && !isVisible(getDenyButton()) && !isVisible(getCancelButton());
        const isScrollable = (elem) => !!(elem.scrollHeight > elem.clientHeight);
        const hasCssAnimation = (elem) => {
          const style = window.getComputedStyle(elem);
          const animDuration = parseFloat(style.getPropertyValue("animation-duration") || "0");
          const transDuration = parseFloat(style.getPropertyValue("transition-duration") || "0");
          return animDuration > 0 || transDuration > 0;
        };
        const animateTimerProgressBar = function(timer) {
          let reset = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : false;
          const timerProgressBar = getTimerProgressBar();
          if (isVisible(timerProgressBar)) {
            if (reset) {
              timerProgressBar.style.transition = "none";
              timerProgressBar.style.width = "100%";
            }
            setTimeout(() => {
              timerProgressBar.style.transition = "width ".concat(timer / 1e3, "s linear");
              timerProgressBar.style.width = "0%";
            }, 10);
          }
        };
        const stopTimerProgressBar = () => {
          const timerProgressBar = getTimerProgressBar();
          const timerProgressBarWidth = parseInt(window.getComputedStyle(timerProgressBar).width);
          timerProgressBar.style.removeProperty("transition");
          timerProgressBar.style.width = "100%";
          const timerProgressBarFullWidth = parseInt(window.getComputedStyle(timerProgressBar).width);
          const timerProgressBarPercent = timerProgressBarWidth / timerProgressBarFullWidth * 100;
          timerProgressBar.style.removeProperty("transition");
          timerProgressBar.style.width = "".concat(timerProgressBarPercent, "%");
        };
        const isNodeEnv = () => typeof window === "undefined" || typeof document === "undefined";
        const RESTORE_FOCUS_TIMEOUT = 100;
        const globalState = {};
        const focusPreviousActiveElement = () => {
          if (globalState.previousActiveElement instanceof HTMLElement) {
            globalState.previousActiveElement.focus();
            globalState.previousActiveElement = null;
          } else if (document.body) {
            document.body.focus();
          }
        };
        const restoreActiveElement = (returnFocus) => {
          return new Promise((resolve) => {
            if (!returnFocus) {
              return resolve();
            }
            const x = window.scrollX;
            const y = window.scrollY;
            globalState.restoreFocusTimeout = setTimeout(() => {
              focusPreviousActiveElement();
              resolve();
            }, RESTORE_FOCUS_TIMEOUT);
            window.scrollTo(x, y);
          });
        };
        const sweetHTML = '\n <div aria-labelledby="'.concat(swalClasses.title, '" aria-describedby="').concat(swalClasses["html-container"], '" class="').concat(swalClasses.popup, '" tabindex="-1">\n   <button type="button" class="').concat(swalClasses.close, '"></button>\n   <ul class="').concat(swalClasses["progress-steps"], '"></ul>\n   <div class="').concat(swalClasses.icon, '"></div>\n   <img class="').concat(swalClasses.image, '" />\n   <h2 class="').concat(swalClasses.title, '" id="').concat(swalClasses.title, '"></h2>\n   <div class="').concat(swalClasses["html-container"], '" id="').concat(swalClasses["html-container"], '"></div>\n   <input class="').concat(swalClasses.input, '" />\n   <input type="file" class="').concat(swalClasses.file, '" />\n   <div class="').concat(swalClasses.range, '">\n     <input type="range" />\n     <output></output>\n   </div>\n   <select class="').concat(swalClasses.select, '"></select>\n   <div class="').concat(swalClasses.radio, '"></div>\n   <label for="').concat(swalClasses.checkbox, '" class="').concat(swalClasses.checkbox, '">\n     <input type="checkbox" />\n     <span class="').concat(swalClasses.label, '"></span>\n   </label>\n   <textarea class="').concat(swalClasses.textarea, '"></textarea>\n   <div class="').concat(swalClasses["validation-message"], '" id="').concat(swalClasses["validation-message"], '"></div>\n   <div class="').concat(swalClasses.actions, '">\n     <div class="').concat(swalClasses.loader, '"></div>\n     <button type="button" class="').concat(swalClasses.confirm, '"></button>\n     <button type="button" class="').concat(swalClasses.deny, '"></button>\n     <button type="button" class="').concat(swalClasses.cancel, '"></button>\n   </div>\n   <div class="').concat(swalClasses.footer, '"></div>\n   <div class="').concat(swalClasses["timer-progress-bar-container"], '">\n     <div class="').concat(swalClasses["timer-progress-bar"], '"></div>\n   </div>\n </div>\n').replace(/(^|\n)\s*/g, "");
        const resetOldContainer = () => {
          const oldContainer = getContainer();
          if (!oldContainer) {
            return false;
          }
          oldContainer.remove();
          removeClass([document.documentElement, document.body], [swalClasses["no-backdrop"], swalClasses["toast-shown"], swalClasses["has-column"]]);
          return true;
        };
        const resetValidationMessage = () => {
          globalState.currentInstance.resetValidationMessage();
        };
        const addInputChangeListeners = () => {
          const popup = getPopup();
          const input = getDirectChildByClass(popup, swalClasses.input);
          const file = getDirectChildByClass(popup, swalClasses.file);
          const range = popup.querySelector(".".concat(swalClasses.range, " input"));
          const rangeOutput = popup.querySelector(".".concat(swalClasses.range, " output"));
          const select = getDirectChildByClass(popup, swalClasses.select);
          const checkbox = popup.querySelector(".".concat(swalClasses.checkbox, " input"));
          const textarea = getDirectChildByClass(popup, swalClasses.textarea);
          input.oninput = resetValidationMessage;
          file.onchange = resetValidationMessage;
          select.onchange = resetValidationMessage;
          checkbox.onchange = resetValidationMessage;
          textarea.oninput = resetValidationMessage;
          range.oninput = () => {
            resetValidationMessage();
            rangeOutput.value = range.value;
          };
          range.onchange = () => {
            resetValidationMessage();
            rangeOutput.value = range.value;
          };
        };
        const getTarget = (target) => typeof target === "string" ? document.querySelector(target) : target;
        const setupAccessibility = (params) => {
          const popup = getPopup();
          popup.setAttribute("role", params.toast ? "alert" : "dialog");
          popup.setAttribute("aria-live", params.toast ? "polite" : "assertive");
          if (!params.toast) {
            popup.setAttribute("aria-modal", "true");
          }
        };
        const setupRTL = (targetElement) => {
          if (window.getComputedStyle(targetElement).direction === "rtl") {
            addClass(getContainer(), swalClasses.rtl);
          }
        };
        const init = (params) => {
          const oldContainerExisted = resetOldContainer();
          if (isNodeEnv()) {
            error("SweetAlert2 requires document to initialize");
            return;
          }
          const container = document.createElement("div");
          container.className = swalClasses.container;
          if (oldContainerExisted) {
            addClass(container, swalClasses["no-transition"]);
          }
          setInnerHtml(container, sweetHTML);
          const targetElement = getTarget(params.target);
          targetElement.appendChild(container);
          setupAccessibility(params);
          setupRTL(targetElement);
          addInputChangeListeners();
          noWarMessageForRussians(container, params);
        };
        const noWarMessageForRussians = (container, params) => {
          if (params.toast) {
            return;
          }
          const message = getRandomElement([{
            text: "\u0428\u0412\u0410\u0420\u0426\u0415\u041D\u0415\u0413\u0413\u0415\u0420 \u043E\u0431\u0440\u0430\u0442\u0438\u043B\u0441\u044F <br> \u043A \u0420\u0423\u0421\u0421\u041A\u041E\u041C\u0423 \u041D\u0410\u0420\u041E\u0414\u0423 \u043E \u0432\u043E\u0439\u043D\u0435",
            youtubeId: "fWClXZd9c78"
          }, {
            text: "\u0420\u0423\u0421\u0421\u041A\u0418\u0419 \u041F\u0410\u0422\u0420\u0418\u041E\u0422 <br> \u043E\u0442\u043A\u0440\u044B\u043B \u0433\u043B\u0430\u0432\u043D\u0443\u044E \u0442\u0430\u0439\u043D\u0443 \u0441\u043F\u0435\u0446\u043E\u043F\u0435\u0440\u0430\u0446\u0438\u0438",
            youtubeId: "_RjBNkn88yA"
          }, {
            text: "\u0413\u0415\u0420\u041E\u0419 \u041D\u041E\u0412\u041E\u0420\u041E\u0421\u0421\u0418\u0418 \u0421\u0422\u0420\u0415\u041B\u041A\u041E\u0412 <br> \u0434\u0430\u043B \u043E\u0446\u0435\u043D\u043A\u0443 \u0445\u043E\u0434\u0443 \u0441\u043F\u0435\u0446\u043E\u043F\u0435\u0440\u0430\u0446\u0438\u0438",
            youtubeId: "yUmzQT4C8JY"
          }, {
            text: "\u0424\u0418\u041D\u0421\u041A\u0418\u0419 \u0414\u0420\u0423\u0413 \u0420\u041E\u0421\u0421\u0418\u0418 <br> \u0433\u043E\u0432\u043E\u0440\u0438\u0442 \u041F\u041E-\u0420\u0423\u0421\u0421\u041A\u0418 \u043E \u0441\u043F\u0435\u0446\u043E\u043F\u0435\u0440\u0430\u0446\u0438\u0438",
            youtubeId: "hkCYb6edUrQ"
          }, {
            text: "\u042E\u0420\u0418\u0419 \u041F\u041E\u0414\u041E\u041B\u042F\u041A\u0410 \u0447\u0435\u0441\u0442\u043D\u043E <br> \u043E \u0433\u0435\u043D\u0435\u0440\u0430\u043B\u0430\u0445 \u0420\u0423\u0421\u0421\u041A\u041E\u0419 \u0410\u0420\u041C\u0418\u0418",
            youtubeId: "w4-_8BJKfpk"
          }, {
            text: "\u041F\u043E\u043B\u043A\u043E\u0432\u043D\u0438\u043A \u0424\u0421\u0411 \u0421\u0422\u0420\u0415\u041B\u041A\u041E\u0412 <br> \u043E\u0431 \u0443\u0441\u043F\u0435\u0445\u0430\u0445 \u0420\u041E\u0421\u0421\u0418\u0418 \u0432 \u0441\u043F\u0435\u0446\u043E\u043F\u0435\u0440\u0430\u0446\u0438\u0438",
            youtubeId: "saK5UTKroDA"
          }]);
          if (navigator.language === "ru" && location.host.match(/\.(ru|su|xn--p1ai)$/)) {
            const noWar = document.createElement("div");
            noWar.className = swalClasses["no-war"];
            setInnerHtml(noWar, '<a href="https://www.youtube.com/watch?v='.concat(message.youtubeId, '" target="_blank">').concat(message.text, "</a>"));
            container.appendChild(noWar);
            container.style.paddingTop = "4em";
          }
        };
        const parseHtmlToContainer = (param, target) => {
          if (param instanceof HTMLElement) {
            target.appendChild(param);
          } else if (typeof param === "object") {
            handleObject(param, target);
          } else if (param) {
            setInnerHtml(target, param);
          }
        };
        const handleObject = (param, target) => {
          if (param.jquery) {
            handleJqueryElem(target, param);
          } else {
            setInnerHtml(target, param.toString());
          }
        };
        const handleJqueryElem = (target, elem) => {
          target.textContent = "";
          if (0 in elem) {
            for (let i = 0; i in elem; i++) {
              target.appendChild(elem[i].cloneNode(true));
            }
          } else {
            target.appendChild(elem.cloneNode(true));
          }
        };
        const animationEndEvent = (() => {
          if (isNodeEnv()) {
            return false;
          }
          const testEl = document.createElement("div");
          const transEndEventNames = {
            WebkitAnimation: "webkitAnimationEnd",
            animation: "animationend"
          };
          for (const i in transEndEventNames) {
            if (Object.prototype.hasOwnProperty.call(transEndEventNames, i) && typeof testEl.style[i] !== "undefined") {
              return transEndEventNames[i];
            }
          }
          return false;
        })();
        const measureScrollbar = () => {
          const scrollDiv = document.createElement("div");
          scrollDiv.className = swalClasses["scrollbar-measure"];
          document.body.appendChild(scrollDiv);
          const scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
          document.body.removeChild(scrollDiv);
          return scrollbarWidth;
        };
        const renderActions = (instance, params) => {
          const actions = getActions();
          const loader = getLoader();
          if (!params.showConfirmButton && !params.showDenyButton && !params.showCancelButton) {
            hide(actions);
          } else {
            show(actions);
          }
          applyCustomClass(actions, params, "actions");
          renderButtons(actions, loader, params);
          setInnerHtml(loader, params.loaderHtml);
          applyCustomClass(loader, params, "loader");
        };
        function renderButtons(actions, loader, params) {
          const confirmButton = getConfirmButton();
          const denyButton = getDenyButton();
          const cancelButton = getCancelButton();
          renderButton(confirmButton, "confirm", params);
          renderButton(denyButton, "deny", params);
          renderButton(cancelButton, "cancel", params);
          handleButtonsStyling(confirmButton, denyButton, cancelButton, params);
          if (params.reverseButtons) {
            if (params.toast) {
              actions.insertBefore(cancelButton, confirmButton);
              actions.insertBefore(denyButton, confirmButton);
            } else {
              actions.insertBefore(cancelButton, loader);
              actions.insertBefore(denyButton, loader);
              actions.insertBefore(confirmButton, loader);
            }
          }
        }
        function handleButtonsStyling(confirmButton, denyButton, cancelButton, params) {
          if (!params.buttonsStyling) {
            return removeClass([confirmButton, denyButton, cancelButton], swalClasses.styled);
          }
          addClass([confirmButton, denyButton, cancelButton], swalClasses.styled);
          if (params.confirmButtonColor) {
            confirmButton.style.backgroundColor = params.confirmButtonColor;
            addClass(confirmButton, swalClasses["default-outline"]);
          }
          if (params.denyButtonColor) {
            denyButton.style.backgroundColor = params.denyButtonColor;
            addClass(denyButton, swalClasses["default-outline"]);
          }
          if (params.cancelButtonColor) {
            cancelButton.style.backgroundColor = params.cancelButtonColor;
            addClass(cancelButton, swalClasses["default-outline"]);
          }
        }
        function renderButton(button, buttonType, params) {
          toggle(button, params["show".concat(capitalizeFirstLetter(buttonType), "Button")], "inline-block");
          setInnerHtml(button, params["".concat(buttonType, "ButtonText")]);
          button.setAttribute("aria-label", params["".concat(buttonType, "ButtonAriaLabel")]);
          button.className = swalClasses[buttonType];
          applyCustomClass(button, params, "".concat(buttonType, "Button"));
          addClass(button, params["".concat(buttonType, "ButtonClass")]);
        }
        const renderContainer = (instance, params) => {
          const container = getContainer();
          if (!container) {
            return;
          }
          handleBackdropParam(container, params.backdrop);
          handlePositionParam(container, params.position);
          handleGrowParam(container, params.grow);
          applyCustomClass(container, params, "container");
        };
        function handleBackdropParam(container, backdrop) {
          if (typeof backdrop === "string") {
            container.style.background = backdrop;
          } else if (!backdrop) {
            addClass([document.documentElement, document.body], swalClasses["no-backdrop"]);
          }
        }
        function handlePositionParam(container, position) {
          if (position in swalClasses) {
            addClass(container, swalClasses[position]);
          } else {
            warn('The "position" parameter is not valid, defaulting to "center"');
            addClass(container, swalClasses.center);
          }
        }
        function handleGrowParam(container, grow) {
          if (grow && typeof grow === "string") {
            const growClass = "grow-".concat(grow);
            if (growClass in swalClasses) {
              addClass(container, swalClasses[growClass]);
            }
          }
        }
        var privateProps = {
          awaitingPromise: /* @__PURE__ */ new WeakMap(),
          promise: /* @__PURE__ */ new WeakMap(),
          innerParams: /* @__PURE__ */ new WeakMap(),
          domCache: /* @__PURE__ */ new WeakMap()
        };
        const inputClasses = ["input", "file", "range", "select", "radio", "checkbox", "textarea"];
        const renderInput = (instance, params) => {
          const popup = getPopup();
          const innerParams = privateProps.innerParams.get(instance);
          const rerender = !innerParams || params.input !== innerParams.input;
          inputClasses.forEach((inputClass) => {
            const inputContainer = getDirectChildByClass(popup, swalClasses[inputClass]);
            setAttributes(inputClass, params.inputAttributes);
            inputContainer.className = swalClasses[inputClass];
            if (rerender) {
              hide(inputContainer);
            }
          });
          if (params.input) {
            if (rerender) {
              showInput(params);
            }
            setCustomClass(params);
          }
        };
        const showInput = (params) => {
          if (!renderInputType[params.input]) {
            return error('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(params.input, '"'));
          }
          const inputContainer = getInputContainer(params.input);
          const input = renderInputType[params.input](inputContainer, params);
          show(inputContainer);
          setTimeout(() => {
            focusInput(input);
          });
        };
        const removeAttributes = (input) => {
          for (let i = 0; i < input.attributes.length; i++) {
            const attrName = input.attributes[i].name;
            if (!["type", "value", "style"].includes(attrName)) {
              input.removeAttribute(attrName);
            }
          }
        };
        const setAttributes = (inputClass, inputAttributes) => {
          const input = getInput(getPopup(), inputClass);
          if (!input) {
            return;
          }
          removeAttributes(input);
          for (const attr in inputAttributes) {
            input.setAttribute(attr, inputAttributes[attr]);
          }
        };
        const setCustomClass = (params) => {
          const inputContainer = getInputContainer(params.input);
          if (typeof params.customClass === "object") {
            addClass(inputContainer, params.customClass.input);
          }
        };
        const setInputPlaceholder = (input, params) => {
          if (!input.placeholder || params.inputPlaceholder) {
            input.placeholder = params.inputPlaceholder;
          }
        };
        const setInputLabel = (input, prependTo, params) => {
          if (params.inputLabel) {
            input.id = swalClasses.input;
            const label = document.createElement("label");
            const labelClass = swalClasses["input-label"];
            label.setAttribute("for", input.id);
            label.className = labelClass;
            if (typeof params.customClass === "object") {
              addClass(label, params.customClass.inputLabel);
            }
            label.innerText = params.inputLabel;
            prependTo.insertAdjacentElement("beforebegin", label);
          }
        };
        const getInputContainer = (inputType) => {
          return getDirectChildByClass(getPopup(), swalClasses[inputType] || swalClasses.input);
        };
        const checkAndSetInputValue = (input, inputValue) => {
          if (["string", "number"].includes(typeof inputValue)) {
            input.value = "".concat(inputValue);
          } else if (!isPromise(inputValue)) {
            warn('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(typeof inputValue, '"'));
          }
        };
        const renderInputType = {};
        renderInputType.text = renderInputType.email = renderInputType.password = renderInputType.number = renderInputType.tel = renderInputType.url = (input, params) => {
          checkAndSetInputValue(input, params.inputValue);
          setInputLabel(input, input, params);
          setInputPlaceholder(input, params);
          input.type = params.input;
          return input;
        };
        renderInputType.file = (input, params) => {
          setInputLabel(input, input, params);
          setInputPlaceholder(input, params);
          return input;
        };
        renderInputType.range = (range, params) => {
          const rangeInput = range.querySelector("input");
          const rangeOutput = range.querySelector("output");
          checkAndSetInputValue(rangeInput, params.inputValue);
          rangeInput.type = params.input;
          checkAndSetInputValue(rangeOutput, params.inputValue);
          setInputLabel(rangeInput, range, params);
          return range;
        };
        renderInputType.select = (select, params) => {
          select.textContent = "";
          if (params.inputPlaceholder) {
            const placeholder = document.createElement("option");
            setInnerHtml(placeholder, params.inputPlaceholder);
            placeholder.value = "";
            placeholder.disabled = true;
            placeholder.selected = true;
            select.appendChild(placeholder);
          }
          setInputLabel(select, select, params);
          return select;
        };
        renderInputType.radio = (radio) => {
          radio.textContent = "";
          return radio;
        };
        renderInputType.checkbox = (checkboxContainer, params) => {
          const checkbox = getInput(getPopup(), "checkbox");
          checkbox.value = "1";
          checkbox.id = swalClasses.checkbox;
          checkbox.checked = Boolean(params.inputValue);
          const label = checkboxContainer.querySelector("span");
          setInnerHtml(label, params.inputPlaceholder);
          return checkbox;
        };
        renderInputType.textarea = (textarea, params) => {
          checkAndSetInputValue(textarea, params.inputValue);
          setInputPlaceholder(textarea, params);
          setInputLabel(textarea, textarea, params);
          const getMargin = (el) => parseInt(window.getComputedStyle(el).marginLeft) + parseInt(window.getComputedStyle(el).marginRight);
          setTimeout(() => {
            if ("MutationObserver" in window) {
              const initialPopupWidth = parseInt(window.getComputedStyle(getPopup()).width);
              const textareaResizeHandler = () => {
                const textareaWidth = textarea.offsetWidth + getMargin(textarea);
                if (textareaWidth > initialPopupWidth) {
                  getPopup().style.width = "".concat(textareaWidth, "px");
                } else {
                  getPopup().style.width = null;
                }
              };
              new MutationObserver(textareaResizeHandler).observe(textarea, {
                attributes: true,
                attributeFilter: ["style"]
              });
            }
          });
          return textarea;
        };
        const renderContent = (instance, params) => {
          const htmlContainer = getHtmlContainer();
          applyCustomClass(htmlContainer, params, "htmlContainer");
          if (params.html) {
            parseHtmlToContainer(params.html, htmlContainer);
            show(htmlContainer, "block");
          } else if (params.text) {
            htmlContainer.textContent = params.text;
            show(htmlContainer, "block");
          } else {
            hide(htmlContainer);
          }
          renderInput(instance, params);
        };
        const renderFooter = (instance, params) => {
          const footer = getFooter();
          toggle(footer, params.footer);
          if (params.footer) {
            parseHtmlToContainer(params.footer, footer);
          }
          applyCustomClass(footer, params, "footer");
        };
        const renderCloseButton = (instance, params) => {
          const closeButton = getCloseButton();
          setInnerHtml(closeButton, params.closeButtonHtml);
          applyCustomClass(closeButton, params, "closeButton");
          toggle(closeButton, params.showCloseButton);
          closeButton.setAttribute("aria-label", params.closeButtonAriaLabel);
        };
        const renderIcon = (instance, params) => {
          const innerParams = privateProps.innerParams.get(instance);
          const icon = getIcon();
          if (innerParams && params.icon === innerParams.icon) {
            setContent(icon, params);
            applyStyles(icon, params);
            return;
          }
          if (!params.icon && !params.iconHtml) {
            hide(icon);
            return;
          }
          if (params.icon && Object.keys(iconTypes).indexOf(params.icon) === -1) {
            error('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(params.icon, '"'));
            hide(icon);
            return;
          }
          show(icon);
          setContent(icon, params);
          applyStyles(icon, params);
          addClass(icon, params.showClass.icon);
        };
        const applyStyles = (icon, params) => {
          for (const iconType in iconTypes) {
            if (params.icon !== iconType) {
              removeClass(icon, iconTypes[iconType]);
            }
          }
          addClass(icon, iconTypes[params.icon]);
          setColor(icon, params);
          adjustSuccessIconBackgroundColor();
          applyCustomClass(icon, params, "icon");
        };
        const adjustSuccessIconBackgroundColor = () => {
          const popup = getPopup();
          const popupBackgroundColor = window.getComputedStyle(popup).getPropertyValue("background-color");
          const successIconParts = popup.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix");
          for (let i = 0; i < successIconParts.length; i++) {
            successIconParts[i].style.backgroundColor = popupBackgroundColor;
          }
        };
        const successIconHtml = '\n  <div class="swal2-success-circular-line-left"></div>\n  <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n  <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n  <div class="swal2-success-circular-line-right"></div>\n';
        const errorIconHtml = '\n  <span class="swal2-x-mark">\n    <span class="swal2-x-mark-line-left"></span>\n    <span class="swal2-x-mark-line-right"></span>\n  </span>\n';
        const setContent = (icon, params) => {
          let oldContent = icon.innerHTML;
          let newContent;
          if (params.iconHtml) {
            newContent = iconContent(params.iconHtml);
          } else if (params.icon === "success") {
            newContent = successIconHtml;
            oldContent = oldContent.replace(/ style=".*?"/g, "");
          } else if (params.icon === "error") {
            newContent = errorIconHtml;
          } else {
            const defaultIconHtml = {
              question: "?",
              warning: "!",
              info: "i"
            };
            newContent = iconContent(defaultIconHtml[params.icon]);
          }
          if (oldContent.trim() !== newContent.trim()) {
            setInnerHtml(icon, newContent);
          }
        };
        const setColor = (icon, params) => {
          if (!params.iconColor) {
            return;
          }
          icon.style.color = params.iconColor;
          icon.style.borderColor = params.iconColor;
          for (const sel of [".swal2-success-line-tip", ".swal2-success-line-long", ".swal2-x-mark-line-left", ".swal2-x-mark-line-right"]) {
            setStyle(icon, sel, "backgroundColor", params.iconColor);
          }
          setStyle(icon, ".swal2-success-ring", "borderColor", params.iconColor);
        };
        const iconContent = (content) => '<div class="'.concat(swalClasses["icon-content"], '">').concat(content, "</div>");
        const renderImage = (instance, params) => {
          const image = getImage();
          if (!params.imageUrl) {
            return hide(image);
          }
          show(image, "");
          image.setAttribute("src", params.imageUrl);
          image.setAttribute("alt", params.imageAlt);
          applyNumericalStyle(image, "width", params.imageWidth);
          applyNumericalStyle(image, "height", params.imageHeight);
          image.className = swalClasses.image;
          applyCustomClass(image, params, "image");
        };
        const renderProgressSteps = (instance, params) => {
          const progressStepsContainer = getProgressSteps();
          if (!params.progressSteps || params.progressSteps.length === 0) {
            return hide(progressStepsContainer);
          }
          show(progressStepsContainer);
          progressStepsContainer.textContent = "";
          if (params.currentProgressStep >= params.progressSteps.length) {
            warn("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)");
          }
          params.progressSteps.forEach((step, index) => {
            const stepEl = createStepElement(step);
            progressStepsContainer.appendChild(stepEl);
            if (index === params.currentProgressStep) {
              addClass(stepEl, swalClasses["active-progress-step"]);
            }
            if (index !== params.progressSteps.length - 1) {
              const lineEl = createLineElement(params);
              progressStepsContainer.appendChild(lineEl);
            }
          });
        };
        const createStepElement = (step) => {
          const stepEl = document.createElement("li");
          addClass(stepEl, swalClasses["progress-step"]);
          setInnerHtml(stepEl, step);
          return stepEl;
        };
        const createLineElement = (params) => {
          const lineEl = document.createElement("li");
          addClass(lineEl, swalClasses["progress-step-line"]);
          if (params.progressStepsDistance) {
            applyNumericalStyle(lineEl, "width", params.progressStepsDistance);
          }
          return lineEl;
        };
        const renderTitle = (instance, params) => {
          const title = getTitle();
          toggle(title, params.title || params.titleText, "block");
          if (params.title) {
            parseHtmlToContainer(params.title, title);
          }
          if (params.titleText) {
            title.innerText = params.titleText;
          }
          applyCustomClass(title, params, "title");
        };
        const renderPopup = (instance, params) => {
          const container = getContainer();
          const popup = getPopup();
          if (params.toast) {
            applyNumericalStyle(container, "width", params.width);
            popup.style.width = "100%";
            popup.insertBefore(getLoader(), getIcon());
          } else {
            applyNumericalStyle(popup, "width", params.width);
          }
          applyNumericalStyle(popup, "padding", params.padding);
          if (params.color) {
            popup.style.color = params.color;
          }
          if (params.background) {
            popup.style.background = params.background;
          }
          hide(getValidationMessage());
          addClasses(popup, params);
        };
        const addClasses = (popup, params) => {
          popup.className = "".concat(swalClasses.popup, " ").concat(isVisible(popup) ? params.showClass.popup : "");
          if (params.toast) {
            addClass([document.documentElement, document.body], swalClasses["toast-shown"]);
            addClass(popup, swalClasses.toast);
          } else {
            addClass(popup, swalClasses.modal);
          }
          applyCustomClass(popup, params, "popup");
          if (typeof params.customClass === "string") {
            addClass(popup, params.customClass);
          }
          if (params.icon) {
            addClass(popup, swalClasses["icon-".concat(params.icon)]);
          }
        };
        const render = (instance, params) => {
          renderPopup(instance, params);
          renderContainer(instance, params);
          renderProgressSteps(instance, params);
          renderIcon(instance, params);
          renderImage(instance, params);
          renderTitle(instance, params);
          renderCloseButton(instance, params);
          renderContent(instance, params);
          renderActions(instance, params);
          renderFooter(instance, params);
          if (typeof params.didRender === "function") {
            params.didRender(getPopup());
          }
        };
        const DismissReason = Object.freeze({
          cancel: "cancel",
          backdrop: "backdrop",
          close: "close",
          esc: "esc",
          timer: "timer"
        });
        const setAriaHidden = () => {
          const bodyChildren = toArray(document.body.children);
          bodyChildren.forEach((el) => {
            if (el === getContainer() || el.contains(getContainer())) {
              return;
            }
            if (el.hasAttribute("aria-hidden")) {
              el.setAttribute("data-previous-aria-hidden", el.getAttribute("aria-hidden"));
            }
            el.setAttribute("aria-hidden", "true");
          });
        };
        const unsetAriaHidden = () => {
          const bodyChildren = toArray(document.body.children);
          bodyChildren.forEach((el) => {
            if (el.hasAttribute("data-previous-aria-hidden")) {
              el.setAttribute("aria-hidden", el.getAttribute("data-previous-aria-hidden"));
              el.removeAttribute("data-previous-aria-hidden");
            } else {
              el.removeAttribute("aria-hidden");
            }
          });
        };
        const swalStringParams = ["swal-title", "swal-html", "swal-footer"];
        const getTemplateParams = (params) => {
          const template = typeof params.template === "string" ? document.querySelector(params.template) : params.template;
          if (!template) {
            return {};
          }
          const templateContent = template.content;
          showWarningsForElements(templateContent);
          const result = Object.assign(getSwalParams(templateContent), getSwalButtons(templateContent), getSwalImage(templateContent), getSwalIcon(templateContent), getSwalInput(templateContent), getSwalStringParams(templateContent, swalStringParams));
          return result;
        };
        const getSwalParams = (templateContent) => {
          const result = {};
          toArray(templateContent.querySelectorAll("swal-param")).forEach((param) => {
            showWarningsForAttributes(param, ["name", "value"]);
            const paramName = param.getAttribute("name");
            const value = param.getAttribute("value");
            if (typeof defaultParams[paramName] === "boolean" && value === "false") {
              result[paramName] = false;
            }
            if (typeof defaultParams[paramName] === "object") {
              result[paramName] = JSON.parse(value);
            }
          });
          return result;
        };
        const getSwalButtons = (templateContent) => {
          const result = {};
          toArray(templateContent.querySelectorAll("swal-button")).forEach((button) => {
            showWarningsForAttributes(button, ["type", "color", "aria-label"]);
            const type = button.getAttribute("type");
            result["".concat(type, "ButtonText")] = button.innerHTML;
            result["show".concat(capitalizeFirstLetter(type), "Button")] = true;
            if (button.hasAttribute("color")) {
              result["".concat(type, "ButtonColor")] = button.getAttribute("color");
            }
            if (button.hasAttribute("aria-label")) {
              result["".concat(type, "ButtonAriaLabel")] = button.getAttribute("aria-label");
            }
          });
          return result;
        };
        const getSwalImage = (templateContent) => {
          const result = {};
          const image = templateContent.querySelector("swal-image");
          if (image) {
            showWarningsForAttributes(image, ["src", "width", "height", "alt"]);
            if (image.hasAttribute("src")) {
              result.imageUrl = image.getAttribute("src");
            }
            if (image.hasAttribute("width")) {
              result.imageWidth = image.getAttribute("width");
            }
            if (image.hasAttribute("height")) {
              result.imageHeight = image.getAttribute("height");
            }
            if (image.hasAttribute("alt")) {
              result.imageAlt = image.getAttribute("alt");
            }
          }
          return result;
        };
        const getSwalIcon = (templateContent) => {
          const result = {};
          const icon = templateContent.querySelector("swal-icon");
          if (icon) {
            showWarningsForAttributes(icon, ["type", "color"]);
            if (icon.hasAttribute("type")) {
              result.icon = icon.getAttribute("type");
            }
            if (icon.hasAttribute("color")) {
              result.iconColor = icon.getAttribute("color");
            }
            result.iconHtml = icon.innerHTML;
          }
          return result;
        };
        const getSwalInput = (templateContent) => {
          const result = {};
          const input = templateContent.querySelector("swal-input");
          if (input) {
            showWarningsForAttributes(input, ["type", "label", "placeholder", "value"]);
            result.input = input.getAttribute("type") || "text";
            if (input.hasAttribute("label")) {
              result.inputLabel = input.getAttribute("label");
            }
            if (input.hasAttribute("placeholder")) {
              result.inputPlaceholder = input.getAttribute("placeholder");
            }
            if (input.hasAttribute("value")) {
              result.inputValue = input.getAttribute("value");
            }
          }
          const inputOptions = templateContent.querySelectorAll("swal-input-option");
          if (inputOptions.length) {
            result.inputOptions = {};
            toArray(inputOptions).forEach((option) => {
              showWarningsForAttributes(option, ["value"]);
              const optionValue = option.getAttribute("value");
              const optionName = option.innerHTML;
              result.inputOptions[optionValue] = optionName;
            });
          }
          return result;
        };
        const getSwalStringParams = (templateContent, paramNames) => {
          const result = {};
          for (const i in paramNames) {
            const paramName = paramNames[i];
            const tag = templateContent.querySelector(paramName);
            if (tag) {
              showWarningsForAttributes(tag, []);
              result[paramName.replace(/^swal-/, "")] = tag.innerHTML.trim();
            }
          }
          return result;
        };
        const showWarningsForElements = (templateContent) => {
          const allowedElements = swalStringParams.concat(["swal-param", "swal-button", "swal-image", "swal-icon", "swal-input", "swal-input-option"]);
          toArray(templateContent.children).forEach((el) => {
            const tagName = el.tagName.toLowerCase();
            if (allowedElements.indexOf(tagName) === -1) {
              warn("Unrecognized element <".concat(tagName, ">"));
            }
          });
        };
        const showWarningsForAttributes = (el, allowedAttributes) => {
          toArray(el.attributes).forEach((attribute) => {
            if (allowedAttributes.indexOf(attribute.name) === -1) {
              warn(['Unrecognized attribute "'.concat(attribute.name, '" on <').concat(el.tagName.toLowerCase(), ">."), "".concat(allowedAttributes.length ? "Allowed attributes are: ".concat(allowedAttributes.join(", ")) : "To set the value, use HTML within the element.")]);
            }
          });
        };
        var defaultInputValidators = {
          email: (string, validationMessage) => {
            return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(string) ? Promise.resolve() : Promise.resolve(validationMessage || "Invalid email address");
          },
          url: (string, validationMessage) => {
            return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(string) ? Promise.resolve() : Promise.resolve(validationMessage || "Invalid URL");
          }
        };
        function setDefaultInputValidators(params) {
          if (!params.inputValidator) {
            Object.keys(defaultInputValidators).forEach((key) => {
              if (params.input === key) {
                params.inputValidator = defaultInputValidators[key];
              }
            });
          }
        }
        function validateCustomTargetElement(params) {
          if (!params.target || typeof params.target === "string" && !document.querySelector(params.target) || typeof params.target !== "string" && !params.target.appendChild) {
            warn('Target parameter is not valid, defaulting to "body"');
            params.target = "body";
          }
        }
        function setParameters(params) {
          setDefaultInputValidators(params);
          if (params.showLoaderOnConfirm && !params.preConfirm) {
            warn("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request");
          }
          validateCustomTargetElement(params);
          if (typeof params.title === "string") {
            params.title = params.title.split("\n").join("<br />");
          }
          init(params);
        }
        class Timer {
          constructor(callback, delay) {
            this.callback = callback;
            this.remaining = delay;
            this.running = false;
            this.start();
          }
          start() {
            if (!this.running) {
              this.running = true;
              this.started = new Date();
              this.id = setTimeout(this.callback, this.remaining);
            }
            return this.remaining;
          }
          stop() {
            if (this.running) {
              this.running = false;
              clearTimeout(this.id);
              this.remaining -= new Date().getTime() - this.started.getTime();
            }
            return this.remaining;
          }
          increase(n) {
            const running = this.running;
            if (running) {
              this.stop();
            }
            this.remaining += n;
            if (running) {
              this.start();
            }
            return this.remaining;
          }
          getTimerLeft() {
            if (this.running) {
              this.stop();
              this.start();
            }
            return this.remaining;
          }
          isRunning() {
            return this.running;
          }
        }
        const fixScrollbar = () => {
          if (states.previousBodyPadding !== null) {
            return;
          }
          if (document.body.scrollHeight > window.innerHeight) {
            states.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right"));
            document.body.style.paddingRight = "".concat(states.previousBodyPadding + measureScrollbar(), "px");
          }
        };
        const undoScrollbar = () => {
          if (states.previousBodyPadding !== null) {
            document.body.style.paddingRight = "".concat(states.previousBodyPadding, "px");
            states.previousBodyPadding = null;
          }
        };
        const iOSfix = () => {
          const iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || navigator.platform === "MacIntel" && navigator.maxTouchPoints > 1;
          if (iOS && !hasClass(document.body, swalClasses.iosfix)) {
            const offset = document.body.scrollTop;
            document.body.style.top = "".concat(offset * -1, "px");
            addClass(document.body, swalClasses.iosfix);
            lockBodyScroll();
            addBottomPaddingForTallPopups();
          }
        };
        const addBottomPaddingForTallPopups = () => {
          const ua = navigator.userAgent;
          const iOS = !!ua.match(/iPad/i) || !!ua.match(/iPhone/i);
          const webkit = !!ua.match(/WebKit/i);
          const iOSSafari = iOS && webkit && !ua.match(/CriOS/i);
          if (iOSSafari) {
            const bottomPanelHeight = 44;
            if (getPopup().scrollHeight > window.innerHeight - bottomPanelHeight) {
              getContainer().style.paddingBottom = "".concat(bottomPanelHeight, "px");
            }
          }
        };
        const lockBodyScroll = () => {
          const container = getContainer();
          let preventTouchMove;
          container.ontouchstart = (e) => {
            preventTouchMove = shouldPreventTouchMove(e);
          };
          container.ontouchmove = (e) => {
            if (preventTouchMove) {
              e.preventDefault();
              e.stopPropagation();
            }
          };
        };
        const shouldPreventTouchMove = (event) => {
          const target = event.target;
          const container = getContainer();
          if (isStylus(event) || isZoom(event)) {
            return false;
          }
          if (target === container) {
            return true;
          }
          if (!isScrollable(container) && target.tagName !== "INPUT" && target.tagName !== "TEXTAREA" && !(isScrollable(getHtmlContainer()) && getHtmlContainer().contains(target))) {
            return true;
          }
          return false;
        };
        const isStylus = (event) => {
          return event.touches && event.touches.length && event.touches[0].touchType === "stylus";
        };
        const isZoom = (event) => {
          return event.touches && event.touches.length > 1;
        };
        const undoIOSfix = () => {
          if (hasClass(document.body, swalClasses.iosfix)) {
            const offset = parseInt(document.body.style.top, 10);
            removeClass(document.body, swalClasses.iosfix);
            document.body.style.top = "";
            document.body.scrollTop = offset * -1;
          }
        };
        const SHOW_CLASS_TIMEOUT = 10;
        const openPopup = (params) => {
          const container = getContainer();
          const popup = getPopup();
          if (typeof params.willOpen === "function") {
            params.willOpen(popup);
          }
          const bodyStyles = window.getComputedStyle(document.body);
          const initialBodyOverflow = bodyStyles.overflowY;
          addClasses$1(container, popup, params);
          setTimeout(() => {
            setScrollingVisibility(container, popup);
          }, SHOW_CLASS_TIMEOUT);
          if (isModal()) {
            fixScrollContainer(container, params.scrollbarPadding, initialBodyOverflow);
            setAriaHidden();
          }
          if (!isToast() && !globalState.previousActiveElement) {
            globalState.previousActiveElement = document.activeElement;
          }
          if (typeof params.didOpen === "function") {
            setTimeout(() => params.didOpen(popup));
          }
          removeClass(container, swalClasses["no-transition"]);
        };
        const swalOpenAnimationFinished = (event) => {
          const popup = getPopup();
          if (event.target !== popup) {
            return;
          }
          const container = getContainer();
          popup.removeEventListener(animationEndEvent, swalOpenAnimationFinished);
          container.style.overflowY = "auto";
        };
        const setScrollingVisibility = (container, popup) => {
          if (animationEndEvent && hasCssAnimation(popup)) {
            container.style.overflowY = "hidden";
            popup.addEventListener(animationEndEvent, swalOpenAnimationFinished);
          } else {
            container.style.overflowY = "auto";
          }
        };
        const fixScrollContainer = (container, scrollbarPadding, initialBodyOverflow) => {
          iOSfix();
          if (scrollbarPadding && initialBodyOverflow !== "hidden") {
            fixScrollbar();
          }
          setTimeout(() => {
            container.scrollTop = 0;
          });
        };
        const addClasses$1 = (container, popup, params) => {
          addClass(container, params.showClass.backdrop);
          popup.style.setProperty("opacity", "0", "important");
          show(popup, "grid");
          setTimeout(() => {
            addClass(popup, params.showClass.popup);
            popup.style.removeProperty("opacity");
          }, SHOW_CLASS_TIMEOUT);
          addClass([document.documentElement, document.body], swalClasses.shown);
          if (params.heightAuto && params.backdrop && !params.toast) {
            addClass([document.documentElement, document.body], swalClasses["height-auto"]);
          }
        };
        const showLoading = (buttonToReplace) => {
          let popup = getPopup();
          if (!popup) {
            new Swal();
          }
          popup = getPopup();
          const loader = getLoader();
          if (isToast()) {
            hide(getIcon());
          } else {
            replaceButton(popup, buttonToReplace);
          }
          show(loader);
          popup.setAttribute("data-loading", "true");
          popup.setAttribute("aria-busy", "true");
          popup.focus();
        };
        const replaceButton = (popup, buttonToReplace) => {
          const actions = getActions();
          const loader = getLoader();
          if (!buttonToReplace && isVisible(getConfirmButton())) {
            buttonToReplace = getConfirmButton();
          }
          show(actions);
          if (buttonToReplace) {
            hide(buttonToReplace);
            loader.setAttribute("data-button-to-replace", buttonToReplace.className);
          }
          loader.parentNode.insertBefore(loader, buttonToReplace);
          addClass([popup, actions], swalClasses.loading);
        };
        const handleInputOptionsAndValue = (instance, params) => {
          if (params.input === "select" || params.input === "radio") {
            handleInputOptions(instance, params);
          } else if (["text", "email", "number", "tel", "textarea"].includes(params.input) && (hasToPromiseFn(params.inputValue) || isPromise(params.inputValue))) {
            showLoading(getConfirmButton());
            handleInputValue(instance, params);
          }
        };
        const getInputValue = (instance, innerParams) => {
          const input = instance.getInput();
          if (!input) {
            return null;
          }
          switch (innerParams.input) {
            case "checkbox":
              return getCheckboxValue(input);
            case "radio":
              return getRadioValue(input);
            case "file":
              return getFileValue(input);
            default:
              return innerParams.inputAutoTrim ? input.value.trim() : input.value;
          }
        };
        const getCheckboxValue = (input) => input.checked ? 1 : 0;
        const getRadioValue = (input) => input.checked ? input.value : null;
        const getFileValue = (input) => input.files.length ? input.getAttribute("multiple") !== null ? input.files : input.files[0] : null;
        const handleInputOptions = (instance, params) => {
          const popup = getPopup();
          const processInputOptions = (inputOptions) => populateInputOptions[params.input](popup, formatInputOptions(inputOptions), params);
          if (hasToPromiseFn(params.inputOptions) || isPromise(params.inputOptions)) {
            showLoading(getConfirmButton());
            asPromise(params.inputOptions).then((inputOptions) => {
              instance.hideLoading();
              processInputOptions(inputOptions);
            });
          } else if (typeof params.inputOptions === "object") {
            processInputOptions(params.inputOptions);
          } else {
            error("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(typeof params.inputOptions));
          }
        };
        const handleInputValue = (instance, params) => {
          const input = instance.getInput();
          hide(input);
          asPromise(params.inputValue).then((inputValue) => {
            input.value = params.input === "number" ? parseFloat(inputValue) || 0 : "".concat(inputValue);
            show(input);
            input.focus();
            instance.hideLoading();
          }).catch((err) => {
            error("Error in inputValue promise: ".concat(err));
            input.value = "";
            show(input);
            input.focus();
            instance.hideLoading();
          });
        };
        const populateInputOptions = {
          select: (popup, inputOptions, params) => {
            const select = getDirectChildByClass(popup, swalClasses.select);
            const renderOption = (parent, optionLabel, optionValue) => {
              const option = document.createElement("option");
              option.value = optionValue;
              setInnerHtml(option, optionLabel);
              option.selected = isSelected(optionValue, params.inputValue);
              parent.appendChild(option);
            };
            inputOptions.forEach((inputOption) => {
              const optionValue = inputOption[0];
              const optionLabel = inputOption[1];
              if (Array.isArray(optionLabel)) {
                const optgroup = document.createElement("optgroup");
                optgroup.label = optionValue;
                optgroup.disabled = false;
                select.appendChild(optgroup);
                optionLabel.forEach((o) => renderOption(optgroup, o[1], o[0]));
              } else {
                renderOption(select, optionLabel, optionValue);
              }
            });
            select.focus();
          },
          radio: (popup, inputOptions, params) => {
            const radio = getDirectChildByClass(popup, swalClasses.radio);
            inputOptions.forEach((inputOption) => {
              const radioValue = inputOption[0];
              const radioLabel = inputOption[1];
              const radioInput = document.createElement("input");
              const radioLabelElement = document.createElement("label");
              radioInput.type = "radio";
              radioInput.name = swalClasses.radio;
              radioInput.value = radioValue;
              if (isSelected(radioValue, params.inputValue)) {
                radioInput.checked = true;
              }
              const label = document.createElement("span");
              setInnerHtml(label, radioLabel);
              label.className = swalClasses.label;
              radioLabelElement.appendChild(radioInput);
              radioLabelElement.appendChild(label);
              radio.appendChild(radioLabelElement);
            });
            const radios = radio.querySelectorAll("input");
            if (radios.length) {
              radios[0].focus();
            }
          }
        };
        const formatInputOptions = (inputOptions) => {
          const result = [];
          if (typeof Map !== "undefined" && inputOptions instanceof Map) {
            inputOptions.forEach((value, key) => {
              let valueFormatted = value;
              if (typeof valueFormatted === "object") {
                valueFormatted = formatInputOptions(valueFormatted);
              }
              result.push([key, valueFormatted]);
            });
          } else {
            Object.keys(inputOptions).forEach((key) => {
              let valueFormatted = inputOptions[key];
              if (typeof valueFormatted === "object") {
                valueFormatted = formatInputOptions(valueFormatted);
              }
              result.push([key, valueFormatted]);
            });
          }
          return result;
        };
        const isSelected = (optionValue, inputValue) => {
          return inputValue && inputValue.toString() === optionValue.toString();
        };
        function hideLoading() {
          const innerParams = privateProps.innerParams.get(this);
          if (!innerParams) {
            return;
          }
          const domCache = privateProps.domCache.get(this);
          hide(domCache.loader);
          if (isToast()) {
            if (innerParams.icon) {
              show(getIcon());
            }
          } else {
            showRelatedButton(domCache);
          }
          removeClass([domCache.popup, domCache.actions], swalClasses.loading);
          domCache.popup.removeAttribute("aria-busy");
          domCache.popup.removeAttribute("data-loading");
          domCache.confirmButton.disabled = false;
          domCache.denyButton.disabled = false;
          domCache.cancelButton.disabled = false;
        }
        const showRelatedButton = (domCache) => {
          const buttonToReplace = domCache.popup.getElementsByClassName(domCache.loader.getAttribute("data-button-to-replace"));
          if (buttonToReplace.length) {
            show(buttonToReplace[0], "inline-block");
          } else if (allButtonsAreHidden()) {
            hide(domCache.actions);
          }
        };
        function getInput$1(instance) {
          const innerParams = privateProps.innerParams.get(instance || this);
          const domCache = privateProps.domCache.get(instance || this);
          if (!domCache) {
            return null;
          }
          return getInput(domCache.popup, innerParams.input);
        }
        var privateMethods = {
          swalPromiseResolve: /* @__PURE__ */ new WeakMap(),
          swalPromiseReject: /* @__PURE__ */ new WeakMap()
        };
        const isVisible$1 = () => {
          return isVisible(getPopup());
        };
        const clickConfirm = () => getConfirmButton() && getConfirmButton().click();
        const clickDeny = () => getDenyButton() && getDenyButton().click();
        const clickCancel = () => getCancelButton() && getCancelButton().click();
        const removeKeydownHandler = (globalState2) => {
          if (globalState2.keydownTarget && globalState2.keydownHandlerAdded) {
            globalState2.keydownTarget.removeEventListener("keydown", globalState2.keydownHandler, {
              capture: globalState2.keydownListenerCapture
            });
            globalState2.keydownHandlerAdded = false;
          }
        };
        const addKeydownHandler = (instance, globalState2, innerParams, dismissWith) => {
          removeKeydownHandler(globalState2);
          if (!innerParams.toast) {
            globalState2.keydownHandler = (e) => keydownHandler(instance, e, dismissWith);
            globalState2.keydownTarget = innerParams.keydownListenerCapture ? window : getPopup();
            globalState2.keydownListenerCapture = innerParams.keydownListenerCapture;
            globalState2.keydownTarget.addEventListener("keydown", globalState2.keydownHandler, {
              capture: globalState2.keydownListenerCapture
            });
            globalState2.keydownHandlerAdded = true;
          }
        };
        const setFocus = (innerParams, index, increment) => {
          const focusableElements = getFocusableElements();
          if (focusableElements.length) {
            index = index + increment;
            if (index === focusableElements.length) {
              index = 0;
            } else if (index === -1) {
              index = focusableElements.length - 1;
            }
            return focusableElements[index].focus();
          }
          getPopup().focus();
        };
        const arrowKeysNextButton = ["ArrowRight", "ArrowDown"];
        const arrowKeysPreviousButton = ["ArrowLeft", "ArrowUp"];
        const keydownHandler = (instance, e, dismissWith) => {
          const innerParams = privateProps.innerParams.get(instance);
          if (!innerParams) {
            return;
          }
          if (e.isComposing || e.keyCode === 229) {
            return;
          }
          if (innerParams.stopKeydownPropagation) {
            e.stopPropagation();
          }
          if (e.key === "Enter") {
            handleEnter(instance, e, innerParams);
          } else if (e.key === "Tab") {
            handleTab(e, innerParams);
          } else if ([...arrowKeysNextButton, ...arrowKeysPreviousButton].includes(e.key)) {
            handleArrows(e.key);
          } else if (e.key === "Escape") {
            handleEsc(e, innerParams, dismissWith);
          }
        };
        const handleEnter = (instance, e, innerParams) => {
          if (!callIfFunction(innerParams.allowEnterKey)) {
            return;
          }
          if (e.target && instance.getInput() && e.target instanceof HTMLElement && e.target.outerHTML === instance.getInput().outerHTML) {
            if (["textarea", "file"].includes(innerParams.input)) {
              return;
            }
            clickConfirm();
            e.preventDefault();
          }
        };
        const handleTab = (e, innerParams) => {
          const targetElement = e.target;
          const focusableElements = getFocusableElements();
          let btnIndex = -1;
          for (let i = 0; i < focusableElements.length; i++) {
            if (targetElement === focusableElements[i]) {
              btnIndex = i;
              break;
            }
          }
          if (!e.shiftKey) {
            setFocus(innerParams, btnIndex, 1);
          } else {
            setFocus(innerParams, btnIndex, -1);
          }
          e.stopPropagation();
          e.preventDefault();
        };
        const handleArrows = (key) => {
          const confirmButton = getConfirmButton();
          const denyButton = getDenyButton();
          const cancelButton = getCancelButton();
          if (document.activeElement instanceof HTMLElement && ![confirmButton, denyButton, cancelButton].includes(document.activeElement)) {
            return;
          }
          const sibling = arrowKeysNextButton.includes(key) ? "nextElementSibling" : "previousElementSibling";
          let buttonToFocus = document.activeElement;
          for (let i = 0; i < getActions().children.length; i++) {
            buttonToFocus = buttonToFocus[sibling];
            if (!buttonToFocus) {
              return;
            }
            if (buttonToFocus instanceof HTMLButtonElement && isVisible(buttonToFocus)) {
              break;
            }
          }
          if (buttonToFocus instanceof HTMLButtonElement) {
            buttonToFocus.focus();
          }
        };
        const handleEsc = (e, innerParams, dismissWith) => {
          if (callIfFunction(innerParams.allowEscapeKey)) {
            e.preventDefault();
            dismissWith(DismissReason.esc);
          }
        };
        function removePopupAndResetState(instance, container, returnFocus, didClose) {
          if (isToast()) {
            triggerDidCloseAndDispose(instance, didClose);
          } else {
            restoreActiveElement(returnFocus).then(() => triggerDidCloseAndDispose(instance, didClose));
            removeKeydownHandler(globalState);
          }
          const isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
          if (isSafari) {
            container.setAttribute("style", "display:none !important");
            container.removeAttribute("class");
            container.innerHTML = "";
          } else {
            container.remove();
          }
          if (isModal()) {
            undoScrollbar();
            undoIOSfix();
            unsetAriaHidden();
          }
          removeBodyClasses();
        }
        function removeBodyClasses() {
          removeClass([document.documentElement, document.body], [swalClasses.shown, swalClasses["height-auto"], swalClasses["no-backdrop"], swalClasses["toast-shown"]]);
        }
        function close(resolveValue) {
          resolveValue = prepareResolveValue(resolveValue);
          const swalPromiseResolve = privateMethods.swalPromiseResolve.get(this);
          const didClose = triggerClosePopup(this);
          if (this.isAwaitingPromise()) {
            if (!resolveValue.isDismissed) {
              handleAwaitingPromise(this);
              swalPromiseResolve(resolveValue);
            }
          } else if (didClose) {
            swalPromiseResolve(resolveValue);
          }
        }
        function isAwaitingPromise() {
          return !!privateProps.awaitingPromise.get(this);
        }
        const triggerClosePopup = (instance) => {
          const popup = getPopup();
          if (!popup) {
            return false;
          }
          const innerParams = privateProps.innerParams.get(instance);
          if (!innerParams || hasClass(popup, innerParams.hideClass.popup)) {
            return false;
          }
          removeClass(popup, innerParams.showClass.popup);
          addClass(popup, innerParams.hideClass.popup);
          const backdrop = getContainer();
          removeClass(backdrop, innerParams.showClass.backdrop);
          addClass(backdrop, innerParams.hideClass.backdrop);
          handlePopupAnimation(instance, popup, innerParams);
          return true;
        };
        function rejectPromise(error2) {
          const rejectPromise2 = privateMethods.swalPromiseReject.get(this);
          handleAwaitingPromise(this);
          if (rejectPromise2) {
            rejectPromise2(error2);
          }
        }
        const handleAwaitingPromise = (instance) => {
          if (instance.isAwaitingPromise()) {
            privateProps.awaitingPromise.delete(instance);
            if (!privateProps.innerParams.get(instance)) {
              instance._destroy();
            }
          }
        };
        const prepareResolveValue = (resolveValue) => {
          if (typeof resolveValue === "undefined") {
            return {
              isConfirmed: false,
              isDenied: false,
              isDismissed: true
            };
          }
          return Object.assign({
            isConfirmed: false,
            isDenied: false,
            isDismissed: false
          }, resolveValue);
        };
        const handlePopupAnimation = (instance, popup, innerParams) => {
          const container = getContainer();
          const animationIsSupported = animationEndEvent && hasCssAnimation(popup);
          if (typeof innerParams.willClose === "function") {
            innerParams.willClose(popup);
          }
          if (animationIsSupported) {
            animatePopup(instance, popup, container, innerParams.returnFocus, innerParams.didClose);
          } else {
            removePopupAndResetState(instance, container, innerParams.returnFocus, innerParams.didClose);
          }
        };
        const animatePopup = (instance, popup, container, returnFocus, didClose) => {
          globalState.swalCloseEventFinishedCallback = removePopupAndResetState.bind(null, instance, container, returnFocus, didClose);
          popup.addEventListener(animationEndEvent, function(e) {
            if (e.target === popup) {
              globalState.swalCloseEventFinishedCallback();
              delete globalState.swalCloseEventFinishedCallback;
            }
          });
        };
        const triggerDidCloseAndDispose = (instance, didClose) => {
          setTimeout(() => {
            if (typeof didClose === "function") {
              didClose.bind(instance.params)();
            }
            instance._destroy();
          });
        };
        function setButtonsDisabled(instance, buttons, disabled) {
          const domCache = privateProps.domCache.get(instance);
          buttons.forEach((button) => {
            domCache[button].disabled = disabled;
          });
        }
        function setInputDisabled(input, disabled) {
          if (!input) {
            return false;
          }
          if (input.type === "radio") {
            const radiosContainer = input.parentNode.parentNode;
            const radios = radiosContainer.querySelectorAll("input");
            for (let i = 0; i < radios.length; i++) {
              radios[i].disabled = disabled;
            }
          } else {
            input.disabled = disabled;
          }
        }
        function enableButtons() {
          setButtonsDisabled(this, ["confirmButton", "denyButton", "cancelButton"], false);
        }
        function disableButtons() {
          setButtonsDisabled(this, ["confirmButton", "denyButton", "cancelButton"], true);
        }
        function enableInput() {
          return setInputDisabled(this.getInput(), false);
        }
        function disableInput() {
          return setInputDisabled(this.getInput(), true);
        }
        function showValidationMessage(error2) {
          const domCache = privateProps.domCache.get(this);
          const params = privateProps.innerParams.get(this);
          setInnerHtml(domCache.validationMessage, error2);
          domCache.validationMessage.className = swalClasses["validation-message"];
          if (params.customClass && params.customClass.validationMessage) {
            addClass(domCache.validationMessage, params.customClass.validationMessage);
          }
          show(domCache.validationMessage);
          const input = this.getInput();
          if (input) {
            input.setAttribute("aria-invalid", true);
            input.setAttribute("aria-describedby", swalClasses["validation-message"]);
            focusInput(input);
            addClass(input, swalClasses.inputerror);
          }
        }
        function resetValidationMessage$1() {
          const domCache = privateProps.domCache.get(this);
          if (domCache.validationMessage) {
            hide(domCache.validationMessage);
          }
          const input = this.getInput();
          if (input) {
            input.removeAttribute("aria-invalid");
            input.removeAttribute("aria-describedby");
            removeClass(input, swalClasses.inputerror);
          }
        }
        function getProgressSteps$1() {
          const domCache = privateProps.domCache.get(this);
          return domCache.progressSteps;
        }
        function update(params) {
          const popup = getPopup();
          const innerParams = privateProps.innerParams.get(this);
          if (!popup || hasClass(popup, innerParams.hideClass.popup)) {
            return warn("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
          }
          const validUpdatableParams = filterValidParams(params);
          const updatedParams = Object.assign({}, innerParams, validUpdatableParams);
          render(this, updatedParams);
          privateProps.innerParams.set(this, updatedParams);
          Object.defineProperties(this, {
            params: {
              value: Object.assign({}, this.params, params),
              writable: false,
              enumerable: true
            }
          });
        }
        const filterValidParams = (params) => {
          const validUpdatableParams = {};
          Object.keys(params).forEach((param) => {
            if (isUpdatableParameter(param)) {
              validUpdatableParams[param] = params[param];
            } else {
              warn("Invalid parameter to update: ".concat(param));
            }
          });
          return validUpdatableParams;
        };
        function _destroy() {
          const domCache = privateProps.domCache.get(this);
          const innerParams = privateProps.innerParams.get(this);
          if (!innerParams) {
            disposeWeakMaps(this);
            return;
          }
          if (domCache.popup && globalState.swalCloseEventFinishedCallback) {
            globalState.swalCloseEventFinishedCallback();
            delete globalState.swalCloseEventFinishedCallback;
          }
          if (typeof innerParams.didDestroy === "function") {
            innerParams.didDestroy();
          }
          disposeSwal(this);
        }
        const disposeSwal = (instance) => {
          disposeWeakMaps(instance);
          delete instance.params;
          delete globalState.keydownHandler;
          delete globalState.keydownTarget;
          delete globalState.currentInstance;
        };
        const disposeWeakMaps = (instance) => {
          if (instance.isAwaitingPromise()) {
            unsetWeakMaps(privateProps, instance);
            privateProps.awaitingPromise.set(instance, true);
          } else {
            unsetWeakMaps(privateMethods, instance);
            unsetWeakMaps(privateProps, instance);
          }
        };
        const unsetWeakMaps = (obj, instance) => {
          for (const i in obj) {
            obj[i].delete(instance);
          }
        };
        var instanceMethods = /* @__PURE__ */ Object.freeze({
          hideLoading,
          disableLoading: hideLoading,
          getInput: getInput$1,
          close,
          isAwaitingPromise,
          rejectPromise,
          handleAwaitingPromise,
          closePopup: close,
          closeModal: close,
          closeToast: close,
          enableButtons,
          disableButtons,
          enableInput,
          disableInput,
          showValidationMessage,
          resetValidationMessage: resetValidationMessage$1,
          getProgressSteps: getProgressSteps$1,
          update,
          _destroy
        });
        const handleConfirmButtonClick = (instance) => {
          const innerParams = privateProps.innerParams.get(instance);
          instance.disableButtons();
          if (innerParams.input) {
            handleConfirmOrDenyWithInput(instance, "confirm");
          } else {
            confirm(instance, true);
          }
        };
        const handleDenyButtonClick = (instance) => {
          const innerParams = privateProps.innerParams.get(instance);
          instance.disableButtons();
          if (innerParams.returnInputValueOnDeny) {
            handleConfirmOrDenyWithInput(instance, "deny");
          } else {
            deny(instance, false);
          }
        };
        const handleCancelButtonClick = (instance, dismissWith) => {
          instance.disableButtons();
          dismissWith(DismissReason.cancel);
        };
        const handleConfirmOrDenyWithInput = (instance, type) => {
          const innerParams = privateProps.innerParams.get(instance);
          if (!innerParams.input) {
            return error('The "input" parameter is needed to be set when using returnInputValueOn'.concat(capitalizeFirstLetter(type)));
          }
          const inputValue = getInputValue(instance, innerParams);
          if (innerParams.inputValidator) {
            handleInputValidator(instance, inputValue, type);
          } else if (!instance.getInput().checkValidity()) {
            instance.enableButtons();
            instance.showValidationMessage(innerParams.validationMessage);
          } else if (type === "deny") {
            deny(instance, inputValue);
          } else {
            confirm(instance, inputValue);
          }
        };
        const handleInputValidator = (instance, inputValue, type) => {
          const innerParams = privateProps.innerParams.get(instance);
          instance.disableInput();
          const validationPromise = Promise.resolve().then(() => asPromise(innerParams.inputValidator(inputValue, innerParams.validationMessage)));
          validationPromise.then((validationMessage) => {
            instance.enableButtons();
            instance.enableInput();
            if (validationMessage) {
              instance.showValidationMessage(validationMessage);
            } else if (type === "deny") {
              deny(instance, inputValue);
            } else {
              confirm(instance, inputValue);
            }
          });
        };
        const deny = (instance, value) => {
          const innerParams = privateProps.innerParams.get(instance || void 0);
          if (innerParams.showLoaderOnDeny) {
            showLoading(getDenyButton());
          }
          if (innerParams.preDeny) {
            privateProps.awaitingPromise.set(instance || void 0, true);
            const preDenyPromise = Promise.resolve().then(() => asPromise(innerParams.preDeny(value, innerParams.validationMessage)));
            preDenyPromise.then((preDenyValue) => {
              if (preDenyValue === false) {
                instance.hideLoading();
                handleAwaitingPromise(instance);
              } else {
                instance.closePopup({
                  isDenied: true,
                  value: typeof preDenyValue === "undefined" ? value : preDenyValue
                });
              }
            }).catch((error$$1) => rejectWith(instance || void 0, error$$1));
          } else {
            instance.closePopup({
              isDenied: true,
              value
            });
          }
        };
        const succeedWith = (instance, value) => {
          instance.closePopup({
            isConfirmed: true,
            value
          });
        };
        const rejectWith = (instance, error$$1) => {
          instance.rejectPromise(error$$1);
        };
        const confirm = (instance, value) => {
          const innerParams = privateProps.innerParams.get(instance || void 0);
          if (innerParams.showLoaderOnConfirm) {
            showLoading();
          }
          if (innerParams.preConfirm) {
            instance.resetValidationMessage();
            privateProps.awaitingPromise.set(instance || void 0, true);
            const preConfirmPromise = Promise.resolve().then(() => asPromise(innerParams.preConfirm(value, innerParams.validationMessage)));
            preConfirmPromise.then((preConfirmValue) => {
              if (isVisible(getValidationMessage()) || preConfirmValue === false) {
                instance.hideLoading();
                handleAwaitingPromise(instance);
              } else {
                succeedWith(instance, typeof preConfirmValue === "undefined" ? value : preConfirmValue);
              }
            }).catch((error$$1) => rejectWith(instance || void 0, error$$1));
          } else {
            succeedWith(instance, value);
          }
        };
        const handlePopupClick = (instance, domCache, dismissWith) => {
          const innerParams = privateProps.innerParams.get(instance);
          if (innerParams.toast) {
            handleToastClick(instance, domCache, dismissWith);
          } else {
            handleModalMousedown(domCache);
            handleContainerMousedown(domCache);
            handleModalClick(instance, domCache, dismissWith);
          }
        };
        const handleToastClick = (instance, domCache, dismissWith) => {
          domCache.popup.onclick = () => {
            const innerParams = privateProps.innerParams.get(instance);
            if (innerParams && (isAnyButtonShown(innerParams) || innerParams.timer || innerParams.input)) {
              return;
            }
            dismissWith(DismissReason.close);
          };
        };
        const isAnyButtonShown = (innerParams) => {
          return innerParams.showConfirmButton || innerParams.showDenyButton || innerParams.showCancelButton || innerParams.showCloseButton;
        };
        let ignoreOutsideClick = false;
        const handleModalMousedown = (domCache) => {
          domCache.popup.onmousedown = () => {
            domCache.container.onmouseup = function(e) {
              domCache.container.onmouseup = void 0;
              if (e.target === domCache.container) {
                ignoreOutsideClick = true;
              }
            };
          };
        };
        const handleContainerMousedown = (domCache) => {
          domCache.container.onmousedown = () => {
            domCache.popup.onmouseup = function(e) {
              domCache.popup.onmouseup = void 0;
              if (e.target === domCache.popup || domCache.popup.contains(e.target)) {
                ignoreOutsideClick = true;
              }
            };
          };
        };
        const handleModalClick = (instance, domCache, dismissWith) => {
          domCache.container.onclick = (e) => {
            const innerParams = privateProps.innerParams.get(instance);
            if (ignoreOutsideClick) {
              ignoreOutsideClick = false;
              return;
            }
            if (e.target === domCache.container && callIfFunction(innerParams.allowOutsideClick)) {
              dismissWith(DismissReason.backdrop);
            }
          };
        };
        const isJqueryElement = (elem) => typeof elem === "object" && elem.jquery;
        const isElement = (elem) => elem instanceof Element || isJqueryElement(elem);
        const argsToParams = (args) => {
          const params = {};
          if (typeof args[0] === "object" && !isElement(args[0])) {
            Object.assign(params, args[0]);
          } else {
            ["title", "html", "icon"].forEach((name, index) => {
              const arg = args[index];
              if (typeof arg === "string" || isElement(arg)) {
                params[name] = arg;
              } else if (arg !== void 0) {
                error("Unexpected type of ".concat(name, '! Expected "string" or "Element", got ').concat(typeof arg));
              }
            });
          }
          return params;
        };
        function fire() {
          const Swal2 = this;
          for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
            args[_key] = arguments[_key];
          }
          return new Swal2(...args);
        }
        function mixin(mixinParams) {
          class MixinSwal extends this {
            _main(params, priorityMixinParams) {
              return super._main(params, Object.assign({}, mixinParams, priorityMixinParams));
            }
          }
          return MixinSwal;
        }
        const getTimerLeft = () => {
          return globalState.timeout && globalState.timeout.getTimerLeft();
        };
        const stopTimer = () => {
          if (globalState.timeout) {
            stopTimerProgressBar();
            return globalState.timeout.stop();
          }
        };
        const resumeTimer = () => {
          if (globalState.timeout) {
            const remaining = globalState.timeout.start();
            animateTimerProgressBar(remaining);
            return remaining;
          }
        };
        const toggleTimer = () => {
          const timer = globalState.timeout;
          return timer && (timer.running ? stopTimer() : resumeTimer());
        };
        const increaseTimer = (n) => {
          if (globalState.timeout) {
            const remaining = globalState.timeout.increase(n);
            animateTimerProgressBar(remaining, true);
            return remaining;
          }
        };
        const isTimerRunning = () => {
          return globalState.timeout && globalState.timeout.isRunning();
        };
        let bodyClickListenerAdded = false;
        const clickHandlers = {};
        function bindClickHandler() {
          let attr = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : "data-swal-template";
          clickHandlers[attr] = this;
          if (!bodyClickListenerAdded) {
            document.body.addEventListener("click", bodyClickListener);
            bodyClickListenerAdded = true;
          }
        }
        const bodyClickListener = (event) => {
          for (let el = event.target; el && el !== document; el = el.parentNode) {
            for (const attr in clickHandlers) {
              const template = el.getAttribute(attr);
              if (template) {
                clickHandlers[attr].fire({
                  template
                });
                return;
              }
            }
          }
        };
        var staticMethods = /* @__PURE__ */ Object.freeze({
          isValidParameter,
          isUpdatableParameter,
          isDeprecatedParameter,
          argsToParams,
          isVisible: isVisible$1,
          clickConfirm,
          clickDeny,
          clickCancel,
          getContainer,
          getPopup,
          getTitle,
          getHtmlContainer,
          getImage,
          getIcon,
          getInputLabel,
          getCloseButton,
          getActions,
          getConfirmButton,
          getDenyButton,
          getCancelButton,
          getLoader,
          getFooter,
          getTimerProgressBar,
          getFocusableElements,
          getValidationMessage,
          isLoading,
          fire,
          mixin,
          showLoading,
          enableLoading: showLoading,
          getTimerLeft,
          stopTimer,
          resumeTimer,
          toggleTimer,
          increaseTimer,
          isTimerRunning,
          bindClickHandler
        });
        let currentInstance;
        class SweetAlert {
          constructor() {
            if (typeof window === "undefined") {
              return;
            }
            currentInstance = this;
            for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
              args[_key] = arguments[_key];
            }
            const outerParams = Object.freeze(this.constructor.argsToParams(args));
            Object.defineProperties(this, {
              params: {
                value: outerParams,
                writable: false,
                enumerable: true,
                configurable: true
              }
            });
            const promise = currentInstance._main(currentInstance.params);
            privateProps.promise.set(this, promise);
          }
          _main(userParams) {
            let mixinParams = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
            showWarningsForParams(Object.assign({}, mixinParams, userParams));
            if (globalState.currentInstance) {
              globalState.currentInstance._destroy();
              if (isModal()) {
                unsetAriaHidden();
              }
            }
            globalState.currentInstance = currentInstance;
            const innerParams = prepareParams(userParams, mixinParams);
            setParameters(innerParams);
            Object.freeze(innerParams);
            if (globalState.timeout) {
              globalState.timeout.stop();
              delete globalState.timeout;
            }
            clearTimeout(globalState.restoreFocusTimeout);
            const domCache = populateDomCache(currentInstance);
            render(currentInstance, innerParams);
            privateProps.innerParams.set(currentInstance, innerParams);
            return swalPromise(currentInstance, domCache, innerParams);
          }
          then(onFulfilled) {
            const promise = privateProps.promise.get(this);
            return promise.then(onFulfilled);
          }
          finally(onFinally) {
            const promise = privateProps.promise.get(this);
            return promise.finally(onFinally);
          }
        }
        const swalPromise = (instance, domCache, innerParams) => {
          return new Promise((resolve, reject) => {
            const dismissWith = (dismiss) => {
              instance.closePopup({
                isDismissed: true,
                dismiss
              });
            };
            privateMethods.swalPromiseResolve.set(instance, resolve);
            privateMethods.swalPromiseReject.set(instance, reject);
            domCache.confirmButton.onclick = () => handleConfirmButtonClick(instance);
            domCache.denyButton.onclick = () => handleDenyButtonClick(instance);
            domCache.cancelButton.onclick = () => handleCancelButtonClick(instance, dismissWith);
            domCache.closeButton.onclick = () => dismissWith(DismissReason.close);
            handlePopupClick(instance, domCache, dismissWith);
            addKeydownHandler(instance, globalState, innerParams, dismissWith);
            handleInputOptionsAndValue(instance, innerParams);
            openPopup(innerParams);
            setupTimer(globalState, innerParams, dismissWith);
            initFocus(domCache, innerParams);
            setTimeout(() => {
              domCache.container.scrollTop = 0;
            });
          });
        };
        const prepareParams = (userParams, mixinParams) => {
          const templateParams = getTemplateParams(userParams);
          const params = Object.assign({}, defaultParams, mixinParams, templateParams, userParams);
          params.showClass = Object.assign({}, defaultParams.showClass, params.showClass);
          params.hideClass = Object.assign({}, defaultParams.hideClass, params.hideClass);
          return params;
        };
        const populateDomCache = (instance) => {
          const domCache = {
            popup: getPopup(),
            container: getContainer(),
            actions: getActions(),
            confirmButton: getConfirmButton(),
            denyButton: getDenyButton(),
            cancelButton: getCancelButton(),
            loader: getLoader(),
            closeButton: getCloseButton(),
            validationMessage: getValidationMessage(),
            progressSteps: getProgressSteps()
          };
          privateProps.domCache.set(instance, domCache);
          return domCache;
        };
        const setupTimer = (globalState$$1, innerParams, dismissWith) => {
          const timerProgressBar = getTimerProgressBar();
          hide(timerProgressBar);
          if (innerParams.timer) {
            globalState$$1.timeout = new Timer(() => {
              dismissWith("timer");
              delete globalState$$1.timeout;
            }, innerParams.timer);
            if (innerParams.timerProgressBar) {
              show(timerProgressBar);
              applyCustomClass(timerProgressBar, innerParams, "timerProgressBar");
              setTimeout(() => {
                if (globalState$$1.timeout && globalState$$1.timeout.running) {
                  animateTimerProgressBar(innerParams.timer);
                }
              });
            }
          }
        };
        const initFocus = (domCache, innerParams) => {
          if (innerParams.toast) {
            return;
          }
          if (!callIfFunction(innerParams.allowEnterKey)) {
            return blurActiveElement();
          }
          if (!focusButton(domCache, innerParams)) {
            setFocus(innerParams, -1, 1);
          }
        };
        const focusButton = (domCache, innerParams) => {
          if (innerParams.focusDeny && isVisible(domCache.denyButton)) {
            domCache.denyButton.focus();
            return true;
          }
          if (innerParams.focusCancel && isVisible(domCache.cancelButton)) {
            domCache.cancelButton.focus();
            return true;
          }
          if (innerParams.focusConfirm && isVisible(domCache.confirmButton)) {
            domCache.confirmButton.focus();
            return true;
          }
          return false;
        };
        const blurActiveElement = () => {
          if (document.activeElement instanceof HTMLElement && typeof document.activeElement.blur === "function") {
            document.activeElement.blur();
          }
        };
        Object.assign(SweetAlert.prototype, instanceMethods);
        Object.assign(SweetAlert, staticMethods);
        Object.keys(instanceMethods).forEach((key) => {
          SweetAlert[key] = function() {
            if (currentInstance) {
              return currentInstance[key](...arguments);
            }
          };
        });
        SweetAlert.DismissReason = DismissReason;
        SweetAlert.version = "11.4.17";
        const Swal = SweetAlert;
        Swal.default = Swal;
        return Swal;
      });
      if (typeof exports !== "undefined" && exports.Sweetalert2) {
        exports.swal = exports.sweetAlert = exports.Swal = exports.SweetAlert = exports.Sweetalert2;
      }
      typeof document != "undefined" && function(e, t) {
        var n = e.createElement("style");
        if (e.getElementsByTagName("head")[0].appendChild(n), n.styleSheet)
          n.styleSheet.disabled || (n.styleSheet.cssText = t);
        else
          try {
            n.innerHTML = t;
          } catch (e2) {
            n.innerText = t;
          }
      }(document, '.swal2-popup.swal2-toast{box-sizing:border-box;grid-column:1/4!important;grid-row:1/4!important;grid-template-columns:1fr 99fr 1fr;padding:1em;overflow-y:hidden;background:#fff;box-shadow:0 0 1px hsla(0deg,0%,0%,.075),0 1px 2px hsla(0deg,0%,0%,.075),1px 2px 4px hsla(0deg,0%,0%,.075),1px 3px 8px hsla(0deg,0%,0%,.075),2px 4px 16px hsla(0deg,0%,0%,.075);pointer-events:all}.swal2-popup.swal2-toast>*{grid-column:2}.swal2-popup.swal2-toast .swal2-title{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-loading{justify-content:center}.swal2-popup.swal2-toast .swal2-input{height:2em;margin:.5em;font-size:1em}.swal2-popup.swal2-toast .swal2-validation-message{font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{grid-column:3/3;grid-row:1/99;align-self:center;width:.8em;height:.8em;margin:0;font-size:2em}.swal2-popup.swal2-toast .swal2-html-container{margin:.5em 1em;padding:0;font-size:1em;text-align:initial}.swal2-popup.swal2-toast .swal2-html-container:empty{padding:0}.swal2-popup.swal2-toast .swal2-loader{grid-column:1;grid-row:1/99;align-self:center;width:2em;height:2em;margin:.25em}.swal2-popup.swal2-toast .swal2-icon{grid-column:1;grid-row:1/99;align-self:center;width:2em;min-width:2em;height:2em;margin:0 .5em 0 0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{justify-content:flex-start;height:auto;margin:0;margin-top:.5em;padding:0 .5em}.swal2-popup.swal2-toast .swal2-styled{margin:.25em .5em;padding:.4em .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:grid;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;box-sizing:border-box;grid-template-areas:"top-start     top            top-end" "center-start  center         center-end" "bottom-start  bottom-center  bottom-end";grid-template-rows:minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto) minmax(-webkit-min-content,auto);grid-template-rows:minmax(min-content,auto) minmax(min-content,auto) minmax(min-content,auto);height:100%;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-bottom-start,.swal2-container.swal2-center-start,.swal2-container.swal2-top-start{grid-template-columns:minmax(0,1fr) auto auto}.swal2-container.swal2-bottom,.swal2-container.swal2-center,.swal2-container.swal2-top{grid-template-columns:auto minmax(0,1fr) auto}.swal2-container.swal2-bottom-end,.swal2-container.swal2-center-end,.swal2-container.swal2-top-end{grid-template-columns:auto auto minmax(0,1fr)}.swal2-container.swal2-top-start>.swal2-popup{align-self:start}.swal2-container.swal2-top>.swal2-popup{grid-column:2;align-self:start;justify-self:center}.swal2-container.swal2-top-end>.swal2-popup,.swal2-container.swal2-top-right>.swal2-popup{grid-column:3;align-self:start;justify-self:end}.swal2-container.swal2-center-left>.swal2-popup,.swal2-container.swal2-center-start>.swal2-popup{grid-row:2;align-self:center}.swal2-container.swal2-center>.swal2-popup{grid-column:2;grid-row:2;align-self:center;justify-self:center}.swal2-container.swal2-center-end>.swal2-popup,.swal2-container.swal2-center-right>.swal2-popup{grid-column:3;grid-row:2;align-self:center;justify-self:end}.swal2-container.swal2-bottom-left>.swal2-popup,.swal2-container.swal2-bottom-start>.swal2-popup{grid-column:1;grid-row:3;align-self:end}.swal2-container.swal2-bottom>.swal2-popup{grid-column:2;grid-row:3;justify-self:center;align-self:end}.swal2-container.swal2-bottom-end>.swal2-popup,.swal2-container.swal2-bottom-right>.swal2-popup{grid-column:3;grid-row:3;align-self:end;justify-self:end}.swal2-container.swal2-grow-fullscreen>.swal2-popup,.swal2-container.swal2-grow-row>.swal2-popup{grid-column:1/4;width:100%}.swal2-container.swal2-grow-column>.swal2-popup,.swal2-container.swal2-grow-fullscreen>.swal2-popup{grid-row:1/4;align-self:stretch}.swal2-container.swal2-no-transition{transition:none!important}.swal2-popup{display:none;position:relative;box-sizing:border-box;grid-template-columns:minmax(0,100%);width:32em;max-width:100%;padding:0 0 1.25em;border:none;border-radius:5px;background:#fff;color:#545454;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-title{position:relative;max-width:100%;margin:0;padding:.8em 1em 0;color:inherit;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:center;width:auto;margin:1.25em auto 0;padding:0}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-loader{display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 transparent #2778c4 transparent}.swal2-styled{margin:.3125em;padding:.625em 1.1em;transition:box-shadow .1s;box-shadow:0 0 0 3px transparent;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#7066e0;color:#fff;font-size:1em}.swal2-styled.swal2-confirm:focus{box-shadow:0 0 0 3px rgba(112,102,224,.5)}.swal2-styled.swal2-deny{border:0;border-radius:.25em;background:initial;background-color:#dc3741;color:#fff;font-size:1em}.swal2-styled.swal2-deny:focus{box-shadow:0 0 0 3px rgba(220,55,65,.5)}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#6e7881;color:#fff;font-size:1em}.swal2-styled.swal2-cancel:focus{box-shadow:0 0 0 3px rgba(110,120,129,.5)}.swal2-styled.swal2-default-outline:focus{box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-styled:focus{outline:0}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1em 0 0;padding:1em 1em 0;border-top:1px solid #eee;color:inherit;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;grid-column:auto!important;overflow:hidden;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:2em auto 1em}.swal2-close{z-index:2;align-items:center;justify-content:center;width:1.2em;height:1.2em;margin-top:0;margin-right:0;margin-bottom:-1.2em;padding:0;overflow:hidden;transition:color .1s,box-shadow .1s;border:none;border-radius:5px;background:0 0;color:#ccc;font-family:serif;font-family:monospace;font-size:2.5em;cursor:pointer;justify-self:end}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close:focus{outline:0;box-shadow:inset 0 0 0 3px rgba(100,150,200,.5)}.swal2-close::-moz-focus-inner{border:0}.swal2-html-container{z-index:1;justify-content:center;margin:1em 1.6em .3em;padding:0;overflow:auto;color:inherit;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word;word-break:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em 2em 3px}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:auto;transition:border-color .1s,box-shadow .1s;border:1px solid #d9d9d9;border-radius:.1875em;background:0 0;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px transparent;color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:inset 0 1px 1px rgba(0,0,0,.06),0 0 0 3px rgba(100,150,200,.5)}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em 2em 3px;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-file{width:75%;margin-right:auto;margin-left:auto;background:0 0;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:0 0;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{flex-shrink:0;margin:0 .4em}.swal2-input-label{display:flex;justify-content:center;margin:1em auto 0}.swal2-validation-message{align-items:center;justify-content:center;margin:1em 0 0;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:"!";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:2.5em auto .6em;border:.25em solid transparent;border-radius:50%;border-color:#000;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-warning.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-warning.swal2-icon-show .swal2-icon-content{-webkit-animation:swal2-animate-i-mark .5s;animation:swal2-animate-i-mark .5s}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-info.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-info.swal2-icon-show .swal2-icon-content{-webkit-animation:swal2-animate-i-mark .8s;animation:swal2-animate-i-mark .8s}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-question.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-question.swal2-icon-show .swal2-icon-content{-webkit-animation:swal2-animate-question-mark .8s;animation:swal2-animate-question-mark .8s}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:1.25em auto;padding:0;background:0 0;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{margin-right:initial;margin-left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}.swal2-no-war{display:flex;position:fixed;z-index:1061;top:0;left:0;align-items:center;justify-content:center;width:100%;height:3.375em;background:#20232a;color:#fff;text-align:center}.swal2-no-war a{color:#61dafb;text-decoration:none}.swal2-no-war a:hover{text-decoration:underline}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-webkit-keyframes swal2-animate-question-mark{0%{transform:rotateY(-360deg)}100%{transform:rotateY(0)}}@keyframes swal2-animate-question-mark{0%{transform:rotateY(-360deg)}100%{transform:rotateY(0)}}@-webkit-keyframes swal2-animate-i-mark{0%{transform:rotateZ(45deg);opacity:0}25%{transform:rotateZ(-25deg);opacity:.4}50%{transform:rotateZ(15deg);opacity:.8}75%{transform:rotateZ(-5deg);opacity:1}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-i-mark{0%{transform:rotateZ(45deg);opacity:0}25%{transform:rotateZ(-25deg);opacity:.4}50%{transform:rotateZ(15deg);opacity:.8}75%{transform:rotateZ(-5deg);opacity:1}100%{transform:rotateX(0);opacity:1}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{background-color:transparent!important;pointer-events:none}body.swal2-no-backdrop .swal2-container .swal2-popup{pointer-events:all}body.swal2-no-backdrop .swal2-container .swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{box-sizing:border-box;width:360px;max-width:100%;background-color:transparent;pointer-events:none}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}');
    }
  });

  // node_modules/formBuilder/dist/form-builder.min.js
  var require_form_builder_min = __commonJS({
    "node_modules/formBuilder/dist/form-builder.min.js"() {
      !function(e) {
        "use strict";
        !function(e2) {
          var t = {};
          function r(o) {
            if (t[o])
              return t[o].exports;
            var n = t[o] = { i: o, l: false, exports: {} };
            return e2[o].call(n.exports, n, n.exports, r), n.l = true, n.exports;
          }
          r.m = e2, r.c = t, r.d = function(e3, t2, o) {
            r.o(e3, t2) || Object.defineProperty(e3, t2, { enumerable: true, get: o });
          }, r.r = function(e3) {
            typeof Symbol != "undefined" && Symbol.toStringTag && Object.defineProperty(e3, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e3, "__esModule", { value: true });
          }, r.t = function(e3, t2) {
            if (1 & t2 && (e3 = r(e3)), 8 & t2)
              return e3;
            if (4 & t2 && typeof e3 == "object" && e3 && e3.__esModule)
              return e3;
            var o = /* @__PURE__ */ Object.create(null);
            if (r.r(o), Object.defineProperty(o, "default", { enumerable: true, value: e3 }), 2 & t2 && typeof e3 != "string")
              for (var n in e3)
                r.d(o, n, function(t3) {
                  return e3[t3];
                }.bind(null, n));
            return o;
          }, r.n = function(e3) {
            var t2 = e3 && e3.__esModule ? function() {
              return e3.default;
            } : function() {
              return e3;
            };
            return r.d(t2, "a", t2), t2;
          }, r.o = function(e3, t2) {
            return Object.prototype.hasOwnProperty.call(e3, t2);
          }, r.p = "", r(r.s = 35);
        }([function(t, r, o) {
          function n(e2, t2) {
            var r2 = Object.keys(e2);
            if (Object.getOwnPropertySymbols) {
              var o2 = Object.getOwnPropertySymbols(e2);
              t2 && (o2 = o2.filter(function(t3) {
                return Object.getOwnPropertyDescriptor(e2, t3).enumerable;
              })), r2.push.apply(r2, o2);
            }
            return r2;
          }
          function i(e2) {
            for (var t2 = 1; t2 < arguments.length; t2++) {
              var r2 = arguments[t2] != null ? arguments[t2] : {};
              t2 % 2 ? n(Object(r2), true).forEach(function(t3) {
                l(e2, t3, r2[t3]);
              }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e2, Object.getOwnPropertyDescriptors(r2)) : n(Object(r2)).forEach(function(t3) {
                Object.defineProperty(e2, t3, Object.getOwnPropertyDescriptor(r2, t3));
              });
            }
            return e2;
          }
          function l(e2, t2, r2) {
            return t2 in e2 ? Object.defineProperty(e2, t2, { value: r2, enumerable: true, configurable: true, writable: true }) : e2[t2] = r2, e2;
          }
          function a(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          o.d(r, "D", function() {
            return s;
          }), o.d(r, "F", function() {
            return c;
          }), o.d(r, "b", function() {
            return u;
          }), o.d(r, "i", function() {
            return p;
          }), o.d(r, "q", function() {
            return b;
          }), o.d(r, "d", function() {
            return h;
          }), o.d(r, "v", function() {
            return g;
          }), o.d(r, "n", function() {
            return y;
          }), o.d(r, "t", function() {
            return w;
          }), o.d(r, "w", function() {
            return O;
          }), o.d(r, "x", function() {
            return C;
          }), o.d(r, "h", function() {
            return j;
          }), o.d(r, "j", function() {
            return q;
          }), o.d(r, "E", function() {
            return E;
          }), o.d(r, "y", function() {
            return N;
          }), o.d(r, "o", function() {
            return S;
          }), o.d(r, "s", function() {
            return T;
          }), o.d(r, "p", function() {
            return D;
          }), o.d(r, "e", function() {
            return B;
          }), o.d(r, "a", function() {
            return R;
          }), o.d(r, "f", function() {
            return I;
          }), o.d(r, "u", function() {
            return F;
          }), o.d(r, "A", function() {
            return P;
          }), o.d(r, "k", function() {
            return M;
          }), o.d(r, "B", function() {
            return H;
          }), o.d(r, "r", function() {
            return z;
          }), o.d(r, "z", function() {
            return W;
          }), o.d(r, "c", function() {
            return U;
          }), o.d(r, "m", function() {
            return V;
          }), o.d(r, "C", function() {
            return Q;
          }), o.d(r, "l", function() {
            return G;
          }), window.fbLoaded = { js: [], css: [] }, window.fbEditors = { quill: {}, tinymce: {} };
          const s = function(e2, t2 = false) {
            const r2 = [null, void 0, ""];
            t2 && r2.push(false);
            for (const t3 in e2)
              r2.includes(e2[t3]) ? delete e2[t3] : Array.isArray(e2[t3]) && (e2[t3].length || delete e2[t3]);
            return e2;
          }, d = function(e2) {
            return !["values", "enableOther", "other", "label", "subtype"].includes(e2);
          }, c = (e2) => Object.entries(e2).map(([e3, t2]) => `${b(e3)}="${t2}"`).join(" "), u = (e2) => Object.entries(e2).map(([e3, t2]) => d(e3) && Object.values(f(e3, t2)).join("")).filter(Boolean).join(" "), f = (e2, t2) => {
            let r2;
            return e2 = m(e2), t2 && (Array.isArray(t2) ? r2 = k(t2.join(" ")) : (typeof t2 == "boolean" && (t2 = t2.toString()), r2 = k(t2.trim()))), { name: e2, value: t2 = t2 ? `="${r2}"` : "" };
          }, p = (e2) => e2.reduce((e3, t2) => e3.concat(Array.isArray(t2) ? p(t2) : t2), []), m = (e2) => ({ className: "class" })[e2] || b(e2), b = (e2) => (e2 = (e2 = e2.replace(/[^\w\s\-]/gi, "")).replace(/([A-Z])/g, function(e3) {
            return "-" + e3.toLowerCase();
          })).replace(/\s/g, "-").replace(/^-+/g, ""), h = (e2) => e2.replace(/-([a-z])/g, (e3, t2) => t2.toUpperCase()), g = function() {
            let e2, t2 = 0;
            return function(r2) {
              const o2 = new Date().getTime();
              o2 === e2 ? ++t2 : (t2 = 0, e2 = o2);
              return (r2.type || b(r2.label)) + "-" + o2 + "-" + t2;
            };
          }(), y = (e2) => e2 === void 0 ? e2 : [["array", (e3) => Array.isArray(e3)], ["node", (e3) => e3 instanceof window.Node || e3 instanceof window.HTMLElement], ["component", () => e2 && e2.dom], [typeof e2, () => true]].find((t2) => t2[1](e2))[0], w = function(e2, t2 = "", r2 = {}) {
            let o2 = y(t2);
            const { events: n2 } = r2, i2 = a(r2, ["events"]), l2 = document.createElement(e2), s2 = { string: (e3) => {
              l2.innerHTML += e3;
            }, object: (e3) => {
              const { tag: t3, content: r3 } = e3, o3 = a(e3, ["tag", "content"]);
              return l2.appendChild(w(t3, r3, o3));
            }, node: (e3) => l2.appendChild(e3), array: (e3) => {
              for (let t3 = 0; t3 < e3.length; t3++)
                o2 = y(e3[t3]), s2[o2](e3[t3]);
            }, function: (e3) => {
              e3 = e3(), o2 = y(e3), s2[o2](e3);
            }, undefined: () => {
            } };
            for (const e3 in i2)
              if (i2.hasOwnProperty(e3)) {
                const t3 = m(e3), r3 = Array.isArray(i2[e3]) ? E(i2[e3].join(" ").split(" ")).join(" ") : i2[e3];
                if (typeof r3 == "boolean") {
                  if (r3 === true) {
                    const e4 = t3 === "contenteditable" || t3;
                    l2.setAttribute(t3, e4);
                  }
                } else
                  l2.setAttribute(t3, r3);
              }
            return t2 && s2[o2](t2), ((e3, t3) => {
              if (t3)
                for (const r3 in t3)
                  t3.hasOwnProperty(r3) && e3.addEventListener(r3, (e4) => t3[r3](e4));
            })(l2, n2), l2;
          }, v = (e2) => {
            const t2 = e2.attributes, r2 = {};
            return q(t2, (e3) => {
              let o2 = t2[e3].value || "";
              o2.match(/false|true/g) ? o2 = o2 === "true" : o2.match(/undefined/g) && (o2 = void 0), o2 && (r2[h(t2[e3].name)] = o2);
            }), r2;
          }, x = (e2) => {
            const t2 = [];
            for (let r2 = 0; r2 < e2.length; r2++) {
              const o2 = i(i({}, v(e2[r2])), {}, { label: e2[r2].textContent });
              t2.push(o2);
            }
            return t2;
          }, A = (e2) => {
            const t2 = [];
            if (e2.length) {
              const r2 = e2[0].getElementsByTagName("value");
              for (let e3 = 0; e3 < r2.length; e3++)
                t2.push(r2[e3].textContent);
            }
            return t2;
          }, O = (e2) => {
            const t2 = new window.DOMParser().parseFromString(e2, "text/xml"), r2 = [];
            if (t2) {
              const e3 = t2.getElementsByTagName("field");
              for (let t3 = 0; t3 < e3.length; t3++) {
                const o2 = v(e3[t3]), n2 = e3[t3].getElementsByTagName("option"), i2 = e3[t3].getElementsByTagName("userData");
                n2 && n2.length && (o2.values = x(n2)), i2 && i2.length && (o2.userData = A(i2)), r2.push(o2);
              }
            }
            return r2;
          }, C = (e2) => {
            const t2 = document.createElement("textarea");
            return t2.innerHTML = e2, t2.textContent;
          }, j = (e2) => {
            const t2 = document.createElement("textarea");
            return t2.textContent = e2, t2.innerHTML;
          }, k = (e2) => {
            const t2 = { '"': "&quot;", "&": "&amp;", "<": "&lt;", ">": "&gt;" };
            return typeof e2 == "string" ? e2.replace(/["&<>]/g, (e3) => t2[e3] || e3) : e2;
          }, q = function(e2, t2, r2) {
            for (let o2 = 0; o2 < e2.length; o2++)
              t2.call(r2, o2, e2[o2]);
          }, E = (e2) => e2.filter((e3, t2, r2) => r2.indexOf(e3) === t2), N = (e2, t2) => {
            const r2 = t2.indexOf(e2);
            r2 > -1 && t2.splice(r2, 1);
          }, S = (e2, t2) => {
            const r2 = jQuery;
            let o2 = [];
            return Array.isArray(e2) || (e2 = [e2]), T(e2) || (o2 = jQuery.map(e2, (e3) => {
              const r3 = { dataType: "script", cache: true, url: (t2 || "") + e3 };
              return jQuery.ajax(r3).done(() => window.fbLoaded.js.push(e3));
            })), o2.push(jQuery.Deferred((e3) => r2(e3.resolve))), jQuery.when(...o2);
          }, T = (e2, t2 = "js") => {
            let r2 = false;
            const o2 = window.fbLoaded[t2];
            return r2 = Array.isArray(e2) ? e2.every((e3) => o2.includes(e3)) : o2.includes(e2), r2;
          }, D = (t2, r2) => {
            Array.isArray(t2) || (t2 = [t2]), t2.forEach((t3) => {
              let o2 = "href", n2 = t3, i2 = "";
              if (typeof t3 == "object" && (o2 = t3.type || (t3.style ? "inline" : "href"), i2 = t3.id, t3 = o2 == "inline" ? t3.style : t3.href, n2 = i2 || t3.href || t3.style), !T(n2, "css")) {
                if (o2 == "href") {
                  const e2 = document.createElement("link");
                  e2.type = "text/css", e2.rel = "stylesheet", e2.href = (r2 || "") + t3, document.head.appendChild(e2);
                } else
                  e(`<style type="text/css">${t3}</style>`).attr("id", i2).appendTo(e(document.head));
                window.fbLoaded.css.push(n2);
              }
            });
          }, B = (e2) => e2.replace(/\b\w/g, function(e3) {
            return e3.toUpperCase();
          }), L = (e2, t2) => {
            const r2 = Object.assign({}, e2, t2);
            for (const o2 in t2)
              r2.hasOwnProperty(o2) && (Array.isArray(t2[o2]) ? r2[o2] = Array.isArray(e2[o2]) ? E(e2[o2].concat(t2[o2])) : t2[o2] : typeof t2[o2] == "object" ? r2[o2] = L(e2[o2], t2[o2]) : r2[o2] = t2[o2]);
            return r2;
          }, R = (e2, t2, r2) => t2.split(" ").forEach((t3) => e2.addEventListener(t3, r2, false)), I = (e2, t2) => {
            const r2 = t2.replace(".", "");
            for (; (e2 = e2.parentElement) && !e2.classList.contains(r2); )
              ;
            return e2;
          }, F = () => {
            let e2 = "";
            var t2;
            return t2 = navigator.userAgent || navigator.vendor || window.opera, /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(t2) && (e2 = "formbuilder-mobile"), e2;
          }, P = (e2) => e2.replace(/\s/g, "-").replace(/[^a-zA-Z0-9[\]_-]/g, ""), M = (e2) => e2.replace(/[^0-9]/g, ""), H = (e2, t2) => t2.filter(function(e3) {
            return !~this.indexOf(e3);
          }, e2), z = (e2) => {
            const t2 = (e2 = Array.isArray(e2) ? e2 : [e2]).map(({ src: e3, id: t3 }) => new Promise((r2) => {
              if (window.fbLoaded.css.includes(e3))
                return r2(e3);
              const o2 = w("link", null, { href: e3, rel: "stylesheet", id: t3 });
              document.head.insertBefore(o2, document.head.firstChild);
            }));
            return Promise.all(t2);
          }, W = (e2) => {
            const t2 = document.getElementById(e2);
            return t2.parentElement.removeChild(t2);
          }, U = /^col-(xs|sm|md|lg)-([^\s]+)/, V = (e2) => e2.split(" ").filter((e3) => U.test(e3) || e3.startsWith("row-"));
          function Q(e2) {
            const t2 = ["a", "an", "and", "as", "at", "but", "by", "for", "for", "from", "in", "into", "near", "nor", "of", "on", "onto", "or", "the", "to", "with"].map((e3) => `\\s${e3}\\s`), r2 = new RegExp(`(?!${t2.join("|")})\\w\\S*`, "g");
            return ("" + e2).replace(r2, (e3) => e3.charAt(0).toUpperCase() + e3.substr(1).replace(/[A-Z]/g, (e4) => " " + e4));
          }
          const Y = { addEventListeners: R, attrString: u, camelCase: h, capitalize: B, closest: I, getContentType: y, escapeAttr: k, escapeAttrs: (e2) => {
            for (const t2 in e2)
              e2.hasOwnProperty(t2) && (e2[t2] = k(e2[t2]));
            return e2;
          }, escapeHtml: j, forceNumber: M, forEach: q, getScripts: S, getStyles: D, hyphenCase: b, isCached: T, markup: w, merge: L, mobileClass: F, nameAttr: g, parseAttrs: v, parsedHtml: C, parseOptions: x, parseUserData: A, parseXML: O, removeFromArray: N, safeAttr: f, safeAttrName: m, safename: P, subtract: H, trimObj: s, unique: E, validAttr: d, titleCase: Q, splitObject: (e2, t2) => {
            const r2 = (e3) => (t3, r3) => (t3[r3] = e3[r3], t3);
            return [Object.keys(e2).filter((e3) => t2.includes(e3)).reduce(r2(e2), {}), Object.keys(e2).filter((e3) => !t2.includes(e3)).reduce(r2(e2), {})];
          } };
          e.fn.swapWith = function(t2) {
            var r2 = e(t2), o2 = e("<div>");
            return this.before(o2), r2.before(this), o2.before(r2).remove(), this;
          };
          const G = (e2) => Object.entries(e2).reduce((e3, [t2, r2]) => i(i({}, e3), {}, { [t2 + "Selector"]: "." + r2 }), {});
          r.g = Y;
        }, function(e2, t, r) {
          r.d(t, "a", function() {
            return a;
          });
          var o = r(0), n = r(2), i = r.n(n);
          function l(e3, t2) {
            if (e3 == null)
              return {};
            var r2, o2, n2 = function(e4, t3) {
              if (e4 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e4);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e4[r3]);
              return n3;
            }(e3, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e3);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e3, r2) && (n2[r2] = e3[r2]);
            }
            return n2;
          }
          class a {
            constructor(e3, t2) {
              this.rawConfig = jQuery.extend({}, e3), e3 = jQuery.extend({}, e3), this.preview = t2, delete e3.isPreview, this.preview && delete e3.required;
              const r2 = ["label", "description", "subtype", "required", "disabled"];
              for (const t3 of r2)
                this[t3] = e3[t3], delete e3[t3];
              e3.id || (e3.name ? e3.id = e3.name : e3.id = "control-" + Math.floor(1e7 * Math.random() + 1)), this.id = e3.id, this.type = e3.type, this.description && (e3.title = this.description), a.controlConfig || (a.controlConfig = {});
              const o2 = this.subtype ? this.type + "." + this.subtype : this.type;
              this.classConfig = jQuery.extend({}, a.controlConfig[o2] || {}), this.subtype && (e3.type = this.subtype), this.required && (e3.required = "required", e3["aria-required"] = "true"), this.disabled && (e3.disabled = "disabled"), this.config = e3, this.configure();
            }
            static get definition() {
              return {};
            }
            static register(e3, t2, r2) {
              const o2 = r2 ? r2 + "." : "";
              a.classRegister || (a.classRegister = {}), Array.isArray(e3) || (e3 = [e3]);
              for (const r3 of e3)
                r3.indexOf(".") === -1 ? a.classRegister[o2 + r3] = t2 : a.error(`Ignoring type ${r3}. Cannot use the character '.' in a type name.`);
            }
            static getRegistered(e3 = false) {
              const t2 = Object.keys(a.classRegister);
              return t2.length ? t2.filter((t3) => e3 ? t3.indexOf(e3 + ".") > -1 : t3.indexOf(".") == -1) : t2;
            }
            static getRegisteredSubtypes() {
              const e3 = {};
              for (const t2 in a.classRegister)
                if (a.classRegister.hasOwnProperty(t2)) {
                  const [r2, o2] = t2.split(".");
                  if (!o2)
                    continue;
                  e3[r2] || (e3[r2] = []), e3[r2].push(o2);
                }
              return e3;
            }
            static getClass(e3, t2) {
              const r2 = t2 ? e3 + "." + t2 : e3, o2 = a.classRegister[r2] || a.classRegister[e3];
              return o2 || a.error("Invalid control type. (Type: " + e3 + ", Subtype: " + t2 + "). Please ensure you have registered it, and imported it correctly.");
            }
            static loadCustom(e3) {
              let t2 = [];
              if (e3 && (t2 = t2.concat(e3)), window.fbControls && (t2 = t2.concat(window.fbControls)), !this.fbControlsLoaded) {
                for (const e4 of t2)
                  e4(a, a.classRegister);
                this.fbControlsLoaded = true;
              }
            }
            static mi18n(e3, t2) {
              const r2 = this.definition;
              let o2 = r2.i18n || {};
              o2 = o2[i.a.locale] || o2.default || o2;
              const n2 = this.camelCase(e3), l2 = typeof o2 == "object" ? o2[n2] || o2[e3] : o2;
              if (l2)
                return l2;
              let a2 = r2.mi18n;
              return typeof a2 == "object" && (a2 = a2[n2] || a2[e3]), a2 || (a2 = n2), i.a.get(a2, t2);
            }
            static active(e3) {
              return !Array.isArray(this.definition.inactive) || this.definition.inactive.indexOf(e3) == -1;
            }
            static label(e3) {
              return this.mi18n(e3);
            }
            static icon(e3) {
              const t2 = this.definition;
              return t2 && typeof t2.icon == "object" ? t2.icon[e3] : t2.icon;
            }
            configure() {
            }
            build() {
              const e3 = this.config, { label: t2, type: r2 } = e3, n2 = l(e3, ["label", "type"]);
              return this.markup(r2, Object(o.x)(t2), n2);
            }
            on(e3) {
              const t2 = { prerender: (e4) => e4, render: (e4) => {
                const t3 = () => {
                  this.onRender && this.onRender(e4);
                };
                this.css && Object(o.p)(this.css), this.js && !Object(o.s)(this.js) ? Object(o.o)(this.js).done(t3) : t3();
              } };
              return e3 ? t2[e3] : t2;
            }
            static error(e3) {
              throw new Error(e3);
            }
            markup(e3, t2 = "", r2 = {}) {
              return this.element = Object(o.t)(e3, t2, r2), this.element;
            }
            parsedHtml(e3) {
              return Object(o.x)(e3);
            }
            static camelCase(e3) {
              return Object(o.d)(e3);
            }
          }
        }, function(e2, t) {
          e2.exports = function(e3) {
            var t2 = {};
            function r(o) {
              if (t2[o])
                return t2[o].exports;
              var n = t2[o] = { i: o, l: false, exports: {} };
              return e3[o].call(n.exports, n, n.exports, r), n.l = true, n.exports;
            }
            return r.m = e3, r.c = t2, r.d = function(e4, t3, o) {
              r.o(e4, t3) || Object.defineProperty(e4, t3, { enumerable: true, get: o });
            }, r.r = function(e4) {
              typeof Symbol != "undefined" && Symbol.toStringTag && Object.defineProperty(e4, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e4, "__esModule", { value: true });
            }, r.t = function(e4, t3) {
              if (1 & t3 && (e4 = r(e4)), 8 & t3)
                return e4;
              if (4 & t3 && typeof e4 == "object" && e4 && e4.__esModule)
                return e4;
              var o = /* @__PURE__ */ Object.create(null);
              if (r.r(o), Object.defineProperty(o, "default", { enumerable: true, value: e4 }), 2 & t3 && typeof e4 != "string")
                for (var n in e4)
                  r.d(o, n, function(t4) {
                    return e4[t4];
                  }.bind(null, n));
              return o;
            }, r.n = function(e4) {
              var t3 = e4 && e4.__esModule ? function() {
                return e4.default;
              } : function() {
                return e4;
              };
              return r.d(t3, "a", t3), t3;
            }, r.o = function(e4, t3) {
              return Object.prototype.hasOwnProperty.call(e4, t3);
            }, r.p = "", r(r.s = 7);
          }([function(e3, t2, r) {
            var o = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e4) {
              return typeof e4;
            } : function(e4) {
              return e4 && typeof Symbol == "function" && e4.constructor === Symbol && e4 !== Symbol.prototype ? "symbol" : typeof e4;
            }, n = r(2), i = r(10), l = Object.prototype.toString;
            function a(e4) {
              return l.call(e4) === "[object Array]";
            }
            function s(e4) {
              return e4 !== null && (e4 === void 0 ? "undefined" : o(e4)) === "object";
            }
            function d(e4) {
              return l.call(e4) === "[object Function]";
            }
            function c(e4, t3) {
              if (e4 != null)
                if ((e4 === void 0 ? "undefined" : o(e4)) !== "object" && (e4 = [e4]), a(e4))
                  for (var r2 = 0, n2 = e4.length; r2 < n2; r2++)
                    t3.call(null, e4[r2], r2, e4);
                else
                  for (var i2 in e4)
                    Object.prototype.hasOwnProperty.call(e4, i2) && t3.call(null, e4[i2], i2, e4);
            }
            e3.exports = { isArray: a, isArrayBuffer: function(e4) {
              return l.call(e4) === "[object ArrayBuffer]";
            }, isBuffer: i, isFormData: function(e4) {
              return typeof FormData != "undefined" && e4 instanceof FormData;
            }, isArrayBufferView: function(e4) {
              return typeof ArrayBuffer != "undefined" && ArrayBuffer.isView ? ArrayBuffer.isView(e4) : e4 && e4.buffer && e4.buffer instanceof ArrayBuffer;
            }, isString: function(e4) {
              return typeof e4 == "string";
            }, isNumber: function(e4) {
              return typeof e4 == "number";
            }, isObject: s, isUndefined: function(e4) {
              return e4 === void 0;
            }, isDate: function(e4) {
              return l.call(e4) === "[object Date]";
            }, isFile: function(e4) {
              return l.call(e4) === "[object File]";
            }, isBlob: function(e4) {
              return l.call(e4) === "[object Blob]";
            }, isFunction: d, isStream: function(e4) {
              return s(e4) && d(e4.pipe);
            }, isURLSearchParams: function(e4) {
              return typeof URLSearchParams != "undefined" && e4 instanceof URLSearchParams;
            }, isStandardBrowserEnv: function() {
              return (typeof navigator == "undefined" || navigator.product !== "ReactNative") && typeof window != "undefined" && typeof document != "undefined";
            }, forEach: c, merge: function e4() {
              var t3 = {};
              function r2(r3, n3) {
                o(t3[n3]) === "object" && (r3 === void 0 ? "undefined" : o(r3)) === "object" ? t3[n3] = e4(t3[n3], r3) : t3[n3] = r3;
              }
              for (var n2 = 0, i2 = arguments.length; n2 < i2; n2++)
                c(arguments[n2], r2);
              return t3;
            }, extend: function(e4, t3, r2) {
              return c(t3, function(t4, o2) {
                e4[o2] = r2 && typeof t4 == "function" ? n(t4, r2) : t4;
              }), e4;
            }, trim: function(e4) {
              return e4.replace(/^\s*/, "").replace(/\s*$/, "");
            } };
          }, function(e3, t2, r) {
            (function(t3) {
              var o = r(0), n = r(13), i = { "Content-Type": "application/x-www-form-urlencoded" };
              function l(e4, t4) {
                !o.isUndefined(e4) && o.isUndefined(e4["Content-Type"]) && (e4["Content-Type"] = t4);
              }
              var a = { adapter: function() {
                var e4;
                return (typeof XMLHttpRequest != "undefined" || t3 !== void 0) && (e4 = r(3)), e4;
              }(), transformRequest: [function(e4, t4) {
                return n(t4, "Content-Type"), o.isFormData(e4) || o.isArrayBuffer(e4) || o.isBuffer(e4) || o.isStream(e4) || o.isFile(e4) || o.isBlob(e4) ? e4 : o.isArrayBufferView(e4) ? e4.buffer : o.isURLSearchParams(e4) ? (l(t4, "application/x-www-form-urlencoded;charset=utf-8"), e4.toString()) : o.isObject(e4) ? (l(t4, "application/json;charset=utf-8"), JSON.stringify(e4)) : e4;
              }], transformResponse: [function(e4) {
                if (typeof e4 == "string")
                  try {
                    e4 = JSON.parse(e4);
                  } catch (e5) {
                  }
                return e4;
              }], timeout: 0, xsrfCookieName: "XSRF-TOKEN", xsrfHeaderName: "X-XSRF-TOKEN", maxContentLength: -1, validateStatus: function(e4) {
                return e4 >= 200 && e4 < 300;
              }, headers: { common: { Accept: "application/json, text/plain, */*" } } };
              o.forEach(["delete", "get", "head"], function(e4) {
                a.headers[e4] = {};
              }), o.forEach(["post", "put", "patch"], function(e4) {
                a.headers[e4] = o.merge(i);
              }), e3.exports = a;
            }).call(this, r(12));
          }, function(e3, t2, r) {
            e3.exports = function(e4, t3) {
              return function() {
                for (var r2 = new Array(arguments.length), o = 0; o < r2.length; o++)
                  r2[o] = arguments[o];
                return e4.apply(t3, r2);
              };
            };
          }, function(e3, t2, r) {
            var o = r(0), n = r(14), i = r(16), l = r(17), a = r(18), s = r(4), d = typeof window != "undefined" && window.btoa && window.btoa.bind(window) || r(19);
            e3.exports = function(e4) {
              return new Promise(function(t3, c) {
                var u = e4.data, f = e4.headers;
                o.isFormData(u) && delete f["Content-Type"];
                var p = new XMLHttpRequest(), m = "onreadystatechange", b = false;
                if (typeof window == "undefined" || !window.XDomainRequest || "withCredentials" in p || a(e4.url) || (p = new window.XDomainRequest(), m = "onload", b = true, p.onprogress = function() {
                }, p.ontimeout = function() {
                }), e4.auth) {
                  var h = e4.auth.username || "", g = e4.auth.password || "";
                  f.Authorization = "Basic " + d(h + ":" + g);
                }
                if (p.open(e4.method.toUpperCase(), i(e4.url, e4.params, e4.paramsSerializer), true), p.timeout = e4.timeout, p[m] = function() {
                  if (p && (p.readyState === 4 || b) && (p.status !== 0 || p.responseURL && p.responseURL.indexOf("file:") === 0)) {
                    var r2 = "getAllResponseHeaders" in p ? l(p.getAllResponseHeaders()) : null, o2 = { data: e4.responseType && e4.responseType !== "text" ? p.response : p.responseText, status: p.status === 1223 ? 204 : p.status, statusText: p.status === 1223 ? "No Content" : p.statusText, headers: r2, config: e4, request: p };
                    n(t3, c, o2), p = null;
                  }
                }, p.onerror = function() {
                  c(s("Network Error", e4, null, p)), p = null;
                }, p.ontimeout = function() {
                  c(s("timeout of " + e4.timeout + "ms exceeded", e4, "ECONNABORTED", p)), p = null;
                }, o.isStandardBrowserEnv()) {
                  var y = r(20), w = (e4.withCredentials || a(e4.url)) && e4.xsrfCookieName ? y.read(e4.xsrfCookieName) : void 0;
                  w && (f[e4.xsrfHeaderName] = w);
                }
                if ("setRequestHeader" in p && o.forEach(f, function(e5, t4) {
                  u === void 0 && t4.toLowerCase() === "content-type" ? delete f[t4] : p.setRequestHeader(t4, e5);
                }), e4.withCredentials && (p.withCredentials = true), e4.responseType)
                  try {
                    p.responseType = e4.responseType;
                  } catch (t4) {
                    if (e4.responseType !== "json")
                      throw t4;
                  }
                typeof e4.onDownloadProgress == "function" && p.addEventListener("progress", e4.onDownloadProgress), typeof e4.onUploadProgress == "function" && p.upload && p.upload.addEventListener("progress", e4.onUploadProgress), e4.cancelToken && e4.cancelToken.promise.then(function(e5) {
                  p && (p.abort(), c(e5), p = null);
                }), u === void 0 && (u = null), p.send(u);
              });
            };
          }, function(e3, t2, r) {
            var o = r(15);
            e3.exports = function(e4, t3, r2, n, i) {
              var l = new Error(e4);
              return o(l, t3, r2, n, i);
            };
          }, function(e3, t2, r) {
            e3.exports = function(e4) {
              return !(!e4 || !e4.__CANCEL__);
            };
          }, function(e3, t2, r) {
            function o(e4) {
              this.message = e4;
            }
            o.prototype.toString = function() {
              return "Cancel" + (this.message ? ": " + this.message : "");
            }, o.prototype.__CANCEL__ = true, e3.exports = o;
          }, function(e3, t2, r) {
            t2.__esModule = true, t2.I18N = void 0;
            var o = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e4) {
              return typeof e4;
            } : function(e4) {
              return e4 && typeof Symbol == "function" && e4.constructor === Symbol && e4 !== Symbol.prototype ? "symbol" : typeof e4;
            }, n = function() {
              function e4(e5, t3) {
                for (var r2 = 0; r2 < t3.length; r2++) {
                  var o2 = t3[r2];
                  o2.enumerable = o2.enumerable || false, o2.configurable = true, "value" in o2 && (o2.writable = true), Object.defineProperty(e5, o2.key, o2);
                }
              }
              return function(t3, r2, o2) {
                return r2 && e4(t3.prototype, r2), o2 && e4(t3, o2), t3;
              };
            }(), i = r(8), l = { extension: ".lang", location: "assets/lang/", langs: ["en-US"], locale: "en-US", override: {} }, a = t2.I18N = function() {
              function e4() {
                var t3 = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : l;
                !function(e5, t4) {
                  if (!(e5 instanceof t4))
                    throw new TypeError("Cannot call a class as a function");
                }(this, e4), this.langs = /* @__PURE__ */ Object.create(null), this.loaded = [], this.processConfig(t3);
              }
              return e4.prototype.processConfig = function(e5) {
                var t3 = this, r2 = Object.assign({}, l, e5), o2 = r2.location, n2 = function(e6, t4) {
                  var r3 = {};
                  for (var o3 in e6)
                    t4.indexOf(o3) >= 0 || Object.prototype.hasOwnProperty.call(e6, o3) && (r3[o3] = e6[o3]);
                  return r3;
                }(r2, ["location"]), i2 = o2.replace(/\/?$/, "/");
                this.config = Object.assign({}, { location: i2 }, n2);
                var a2 = this.config, s = a2.override, d = a2.preloaded, c = d === void 0 ? {} : d, u = Object.entries(this.langs).concat(Object.entries(s || c));
                this.langs = u.reduce(function(e6, r3) {
                  var o3 = r3[0], n3 = r3[1];
                  return e6[o3] = t3.applyLanguage.call(t3, o3, n3), e6;
                }, {}), this.locale = this.config.locale || this.config.langs[0];
              }, e4.prototype.init = function(e5) {
                return this.processConfig.call(this, Object.assign({}, this.config, e5)), this.setCurrent(this.locale);
              }, e4.prototype.addLanguage = function(e5) {
                var t3 = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
                t3 = typeof t3 == "string" ? this.processFile.call(this, t3) : t3, this.applyLanguage.call(this, e5, t3), this.config.langs.push("locale");
              }, e4.prototype.getValue = function(e5) {
                var t3 = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : this.locale;
                return this.langs[t3] && this.langs[t3][e5] || this.getFallbackValue(e5);
              }, e4.prototype.getFallbackValue = function(e5) {
                var t3 = Object.values(this.langs).find(function(t4) {
                  return t4[e5];
                });
                return t3 && t3[e5];
              }, e4.prototype.makeSafe = function(e5) {
                var t3 = { "{": "\\{", "}": "\\}", "|": "\\|" };
                return e5 = e5.replace(/\{|\}|\|/g, function(e6) {
                  return t3[e6];
                }), new RegExp(e5, "g");
              }, e4.prototype.put = function(e5, t3) {
                return this.current[e5] = t3;
              }, e4.prototype.get = function(e5, t3) {
                var r2 = this.getValue(e5);
                if (r2) {
                  var n2 = r2.match(/\{[^}]+?\}/g), i2 = void 0;
                  if (t3 && n2)
                    if ((t3 === void 0 ? "undefined" : o(t3)) === "object")
                      for (var l2 = 0; l2 < n2.length; l2++)
                        i2 = n2[l2].substring(1, n2[l2].length - 1), r2 = r2.replace(this.makeSafe(n2[l2]), t3[i2] || "");
                    else
                      r2 = r2.replace(/\{[^}]+?\}/g, t3);
                  return r2;
                }
              }, e4.prototype.fromFile = function(e5) {
                for (var t3, r2 = e5.split("\n"), o2 = {}, n2 = 0; n2 < r2.length; n2++)
                  (t3 = r2[n2].match(/^(.+?) *?= *?([^\n]+)/)) && (o2[t3[1]] = t3[2].replace(/^\s+|\s+$/, ""));
                return o2;
              }, e4.prototype.processFile = function(e5) {
                return this.fromFile(e5.replace(/\n\n/g, "\n"));
              }, e4.prototype.loadLang = function(e5) {
                var t3 = !(arguments.length > 1 && arguments[1] !== void 0) || arguments[1], r2 = this;
                return new Promise(function(o2, n2) {
                  if (r2.loaded.indexOf(e5) !== -1 && t3)
                    return r2.applyLanguage.call(r2, r2.langs[e5]), o2(r2.langs[e5]);
                  var l2 = [r2.config.location, e5, r2.config.extension].join("");
                  return (0, i.get)(l2).then(function(t4) {
                    var n3 = t4.data, i2 = r2.processFile(n3);
                    return r2.applyLanguage.call(r2, e5, i2), r2.loaded.push(e5), o2(r2.langs[e5]);
                  }).catch(function() {
                    var t4 = r2.applyLanguage.call(r2, e5);
                    o2(t4);
                  });
                });
              }, e4.prototype.applyLanguage = function(e5) {
                var t3 = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {}, r2 = this.config.override[e5] || {}, o2 = this.langs[e5] || {};
                return this.langs[e5] = Object.assign({}, o2, t3, r2), this.langs[e5];
              }, e4.prototype.setCurrent = function() {
                var e5 = this, t3 = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : "en-US";
                return this.loadLang(t3).then(function() {
                  return e5.locale = t3, e5.current = e5.langs[t3], e5.current;
                });
              }, n(e4, [{ key: "getLangs", get: function() {
                return this.config.langs;
              } }]), e4;
            }();
            t2.default = new a();
          }, function(e3, t2, r) {
            e3.exports = r(9);
          }, function(e3, t2, r) {
            var o = r(0), n = r(2), i = r(11), l = r(1);
            function a(e4) {
              var t3 = new i(e4), r2 = n(i.prototype.request, t3);
              return o.extend(r2, i.prototype, t3), o.extend(r2, t3), r2;
            }
            var s = a(l);
            s.Axios = i, s.create = function(e4) {
              return a(o.merge(l, e4));
            }, s.Cancel = r(6), s.CancelToken = r(26), s.isCancel = r(5), s.all = function(e4) {
              return Promise.all(e4);
            }, s.spread = r(27), e3.exports = s, e3.exports.default = s;
          }, function(e3, t2, r) {
            function o(e4) {
              return !!e4.constructor && typeof e4.constructor.isBuffer == "function" && e4.constructor.isBuffer(e4);
            }
            e3.exports = function(e4) {
              return e4 != null && (o(e4) || function(e5) {
                return typeof e5.readFloatLE == "function" && typeof e5.slice == "function" && o(e5.slice(0, 0));
              }(e4) || !!e4._isBuffer);
            };
          }, function(e3, t2, r) {
            var o = r(1), n = r(0), i = r(21), l = r(22);
            function a(e4) {
              this.defaults = e4, this.interceptors = { request: new i(), response: new i() };
            }
            a.prototype.request = function(e4) {
              typeof e4 == "string" && (e4 = n.merge({ url: arguments[0] }, arguments[1])), (e4 = n.merge(o, { method: "get" }, this.defaults, e4)).method = e4.method.toLowerCase();
              var t3 = [l, void 0], r2 = Promise.resolve(e4);
              for (this.interceptors.request.forEach(function(e5) {
                t3.unshift(e5.fulfilled, e5.rejected);
              }), this.interceptors.response.forEach(function(e5) {
                t3.push(e5.fulfilled, e5.rejected);
              }); t3.length; )
                r2 = r2.then(t3.shift(), t3.shift());
              return r2;
            }, n.forEach(["delete", "get", "head", "options"], function(e4) {
              a.prototype[e4] = function(t3, r2) {
                return this.request(n.merge(r2 || {}, { method: e4, url: t3 }));
              };
            }), n.forEach(["post", "put", "patch"], function(e4) {
              a.prototype[e4] = function(t3, r2, o2) {
                return this.request(n.merge(o2 || {}, { method: e4, url: t3, data: r2 }));
              };
            }), e3.exports = a;
          }, function(e3, t2, r) {
            var o, n, i = e3.exports = {};
            function l() {
              throw new Error("setTimeout has not been defined");
            }
            function a() {
              throw new Error("clearTimeout has not been defined");
            }
            function s(e4) {
              if (o === setTimeout)
                return setTimeout(e4, 0);
              if ((o === l || !o) && setTimeout)
                return o = setTimeout, setTimeout(e4, 0);
              try {
                return o(e4, 0);
              } catch (t3) {
                try {
                  return o.call(null, e4, 0);
                } catch (t4) {
                  return o.call(this, e4, 0);
                }
              }
            }
            !function() {
              try {
                o = typeof setTimeout == "function" ? setTimeout : l;
              } catch (e4) {
                o = l;
              }
              try {
                n = typeof clearTimeout == "function" ? clearTimeout : a;
              } catch (e4) {
                n = a;
              }
            }();
            var d, c = [], u = false, f = -1;
            function p() {
              u && d && (u = false, d.length ? c = d.concat(c) : f = -1, c.length && m());
            }
            function m() {
              if (!u) {
                var e4 = s(p);
                u = true;
                for (var t3 = c.length; t3; ) {
                  for (d = c, c = []; ++f < t3; )
                    d && d[f].run();
                  f = -1, t3 = c.length;
                }
                d = null, u = false, function(e5) {
                  if (n === clearTimeout)
                    return clearTimeout(e5);
                  if ((n === a || !n) && clearTimeout)
                    return n = clearTimeout, clearTimeout(e5);
                  try {
                    n(e5);
                  } catch (t4) {
                    try {
                      return n.call(null, e5);
                    } catch (t5) {
                      return n.call(this, e5);
                    }
                  }
                }(e4);
              }
            }
            function b(e4, t3) {
              this.fun = e4, this.array = t3;
            }
            function h() {
            }
            i.nextTick = function(e4) {
              var t3 = new Array(arguments.length - 1);
              if (arguments.length > 1)
                for (var r2 = 1; r2 < arguments.length; r2++)
                  t3[r2 - 1] = arguments[r2];
              c.push(new b(e4, t3)), c.length !== 1 || u || s(m);
            }, b.prototype.run = function() {
              this.fun.apply(null, this.array);
            }, i.title = "browser", i.browser = true, i.env = {}, i.argv = [], i.version = "", i.versions = {}, i.on = h, i.addListener = h, i.once = h, i.off = h, i.removeListener = h, i.removeAllListeners = h, i.emit = h, i.prependListener = h, i.prependOnceListener = h, i.listeners = function(e4) {
              return [];
            }, i.binding = function(e4) {
              throw new Error("process.binding is not supported");
            }, i.cwd = function() {
              return "/";
            }, i.chdir = function(e4) {
              throw new Error("process.chdir is not supported");
            }, i.umask = function() {
              return 0;
            };
          }, function(e3, t2, r) {
            var o = r(0);
            e3.exports = function(e4, t3) {
              o.forEach(e4, function(r2, o2) {
                o2 !== t3 && o2.toUpperCase() === t3.toUpperCase() && (e4[t3] = r2, delete e4[o2]);
              });
            };
          }, function(e3, t2, r) {
            var o = r(4);
            e3.exports = function(e4, t3, r2) {
              var n = r2.config.validateStatus;
              r2.status && n && !n(r2.status) ? t3(o("Request failed with status code " + r2.status, r2.config, null, r2.request, r2)) : e4(r2);
            };
          }, function(e3, t2, r) {
            e3.exports = function(e4, t3, r2, o, n) {
              return e4.config = t3, r2 && (e4.code = r2), e4.request = o, e4.response = n, e4;
            };
          }, function(e3, t2, r) {
            var o = r(0);
            function n(e4) {
              return encodeURIComponent(e4).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(/%20/g, "+").replace(/%5B/gi, "[").replace(/%5D/gi, "]");
            }
            e3.exports = function(e4, t3, r2) {
              if (!t3)
                return e4;
              var i;
              if (r2)
                i = r2(t3);
              else if (o.isURLSearchParams(t3))
                i = t3.toString();
              else {
                var l = [];
                o.forEach(t3, function(e5, t4) {
                  e5 != null && (o.isArray(e5) ? t4 += "[]" : e5 = [e5], o.forEach(e5, function(e6) {
                    o.isDate(e6) ? e6 = e6.toISOString() : o.isObject(e6) && (e6 = JSON.stringify(e6)), l.push(n(t4) + "=" + n(e6));
                  }));
                }), i = l.join("&");
              }
              return i && (e4 += (e4.indexOf("?") === -1 ? "?" : "&") + i), e4;
            };
          }, function(e3, t2, r) {
            var o = r(0), n = ["age", "authorization", "content-length", "content-type", "etag", "expires", "from", "host", "if-modified-since", "if-unmodified-since", "last-modified", "location", "max-forwards", "proxy-authorization", "referer", "retry-after", "user-agent"];
            e3.exports = function(e4) {
              var t3, r2, i, l = {};
              return e4 ? (o.forEach(e4.split("\n"), function(e5) {
                if (i = e5.indexOf(":"), t3 = o.trim(e5.substr(0, i)).toLowerCase(), r2 = o.trim(e5.substr(i + 1)), t3) {
                  if (l[t3] && n.indexOf(t3) >= 0)
                    return;
                  l[t3] = t3 === "set-cookie" ? (l[t3] ? l[t3] : []).concat([r2]) : l[t3] ? l[t3] + ", " + r2 : r2;
                }
              }), l) : l;
            };
          }, function(e3, t2, r) {
            var o = r(0);
            e3.exports = o.isStandardBrowserEnv() ? function() {
              var e4, t3 = /(msie|trident)/i.test(navigator.userAgent), r2 = document.createElement("a");
              function n(e5) {
                var o2 = e5;
                return t3 && (r2.setAttribute("href", o2), o2 = r2.href), r2.setAttribute("href", o2), { href: r2.href, protocol: r2.protocol ? r2.protocol.replace(/:$/, "") : "", host: r2.host, search: r2.search ? r2.search.replace(/^\?/, "") : "", hash: r2.hash ? r2.hash.replace(/^#/, "") : "", hostname: r2.hostname, port: r2.port, pathname: r2.pathname.charAt(0) === "/" ? r2.pathname : "/" + r2.pathname };
              }
              return e4 = n(window.location.href), function(t4) {
                var r3 = o.isString(t4) ? n(t4) : t4;
                return r3.protocol === e4.protocol && r3.host === e4.host;
              };
            }() : function() {
              return true;
            };
          }, function(e3, t2, r) {
            function o() {
              this.message = "String contains an invalid character";
            }
            o.prototype = new Error(), o.prototype.code = 5, o.prototype.name = "InvalidCharacterError", e3.exports = function(e4) {
              for (var t3, r2, n = String(e4), i = "", l = 0, a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="; n.charAt(0 | l) || (a = "=", l % 1); i += a.charAt(63 & t3 >> 8 - l % 1 * 8)) {
                if ((r2 = n.charCodeAt(l += 0.75)) > 255)
                  throw new o();
                t3 = t3 << 8 | r2;
              }
              return i;
            };
          }, function(e3, t2, r) {
            var o = r(0);
            e3.exports = o.isStandardBrowserEnv() ? { write: function(e4, t3, r2, n, i, l) {
              var a = [];
              a.push(e4 + "=" + encodeURIComponent(t3)), o.isNumber(r2) && a.push("expires=" + new Date(r2).toGMTString()), o.isString(n) && a.push("path=" + n), o.isString(i) && a.push("domain=" + i), l === true && a.push("secure"), document.cookie = a.join("; ");
            }, read: function(e4) {
              var t3 = document.cookie.match(new RegExp("(^|;\\s*)(" + e4 + ")=([^;]*)"));
              return t3 ? decodeURIComponent(t3[3]) : null;
            }, remove: function(e4) {
              this.write(e4, "", Date.now() - 864e5);
            } } : { write: function() {
            }, read: function() {
              return null;
            }, remove: function() {
            } };
          }, function(e3, t2, r) {
            var o = r(0);
            function n() {
              this.handlers = [];
            }
            n.prototype.use = function(e4, t3) {
              return this.handlers.push({ fulfilled: e4, rejected: t3 }), this.handlers.length - 1;
            }, n.prototype.eject = function(e4) {
              this.handlers[e4] && (this.handlers[e4] = null);
            }, n.prototype.forEach = function(e4) {
              o.forEach(this.handlers, function(t3) {
                t3 !== null && e4(t3);
              });
            }, e3.exports = n;
          }, function(e3, t2, r) {
            var o = r(0), n = r(23), i = r(5), l = r(1), a = r(24), s = r(25);
            function d(e4) {
              e4.cancelToken && e4.cancelToken.throwIfRequested();
            }
            e3.exports = function(e4) {
              return d(e4), e4.baseURL && !a(e4.url) && (e4.url = s(e4.baseURL, e4.url)), e4.headers = e4.headers || {}, e4.data = n(e4.data, e4.headers, e4.transformRequest), e4.headers = o.merge(e4.headers.common || {}, e4.headers[e4.method] || {}, e4.headers || {}), o.forEach(["delete", "get", "head", "post", "put", "patch", "common"], function(t3) {
                delete e4.headers[t3];
              }), (e4.adapter || l.adapter)(e4).then(function(t3) {
                return d(e4), t3.data = n(t3.data, t3.headers, e4.transformResponse), t3;
              }, function(t3) {
                return i(t3) || (d(e4), t3 && t3.response && (t3.response.data = n(t3.response.data, t3.response.headers, e4.transformResponse))), Promise.reject(t3);
              });
            };
          }, function(e3, t2, r) {
            var o = r(0);
            e3.exports = function(e4, t3, r2) {
              return o.forEach(r2, function(r3) {
                e4 = r3(e4, t3);
              }), e4;
            };
          }, function(e3, t2, r) {
            e3.exports = function(e4) {
              return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e4);
            };
          }, function(e3, t2, r) {
            e3.exports = function(e4, t3) {
              return t3 ? e4.replace(/\/+$/, "") + "/" + t3.replace(/^\/+/, "") : e4;
            };
          }, function(e3, t2, r) {
            var o = r(6);
            function n(e4) {
              if (typeof e4 != "function")
                throw new TypeError("executor must be a function.");
              var t3;
              this.promise = new Promise(function(e5) {
                t3 = e5;
              });
              var r2 = this;
              e4(function(e5) {
                r2.reason || (r2.reason = new o(e5), t3(r2.reason));
              });
            }
            n.prototype.throwIfRequested = function() {
              if (this.reason)
                throw this.reason;
            }, n.source = function() {
              var e4;
              return { token: new n(function(t3) {
                e4 = t3;
              }), cancel: e4 };
            }, e3.exports = n;
          }, function(e3, t2, r) {
            e3.exports = function(e4) {
              return function(t3) {
                return e4.apply(null, t3);
              };
            };
          }]);
        }, function(e2, t, r) {
          r.d(t, "d", function() {
            return i;
          }), r.d(t, "g", function() {
            return l;
          }), r.d(t, "c", function() {
            return a;
          }), r.d(t, "a", function() {
            return s;
          }), r.d(t, "f", function() {
            return d;
          }), r.d(t, "e", function() {
            return c;
          }), r.d(t, "b", function() {
            return u;
          });
          var o = r(2);
          const n = () => null;
          r.n(o).a.addLanguage("en-US", { NATIVE_NAME: "English (US)", ENGLISH_NAME: "English", addOption: "Add Option +", allFieldsRemoved: "All fields were removed.", allowMultipleFiles: "Allow users to upload multiple files", autocomplete: "Autocomplete", button: "Button", cannotBeEmpty: "This field cannot be empty", checkboxGroup: "Checkbox Group", checkbox: "Checkbox", checkboxes: "Checkboxes", className: "Class", clearAllMessage: "Are you sure you want to clear all fields?", clear: "Clear", close: "Close", content: "Content", copy: "Copy To Clipboard", copyButton: "&#43;", copyButtonTooltip: "Copy", dateField: "Date Field", description: "Help Text", descriptionField: "Description", devMode: "Developer Mode", editNames: "Edit Names", editorTitle: "Form Elements", editXML: "Edit XML", enableOther: "Enable &quot;Other&quot;", enableOtherMsg: "Let users enter an unlisted option", fieldDeleteWarning: "false", fieldVars: "Field Variables", fieldNonEditable: "This field cannot be edited.", fieldRemoveWarning: "Are you sure you want to remove this field?", fileUpload: "File Upload", formUpdated: "Form Updated", getStarted: "Drag a field from the right to this area", header: "Header", hide: "Edit", hidden: "Hidden Input", inline: "Inline", inlineDesc: "Display {type} inline", label: "Label", labelEmpty: "Field Label cannot be empty", limitRole: "Limit access to one or more of the following roles:", mandatory: "Mandatory", maxlength: "Max Length", minOptionMessage: "This field requires a minimum of 2 options", minSelectionRequired: "Minimum {min} selections required", multipleFiles: "Multiple Files", name: "Name", no: "No", noFieldsToClear: "There are no fields to clear", number: "Number", off: "Off", on: "On", option: "Option", optionCount: "Option {count}", options: "Options", optional: "optional", optionLabelPlaceholder: "Label", optionValuePlaceholder: "Value", optionEmpty: "Option value required", other: "Other", paragraph: "Paragraph", placeholder: "Placeholder", "placeholders.value": "Value", "placeholders.label": "Label", "placeholders.email": "Enter your email", "placeholders.className": "space separated classes", "placeholders.password": "Enter your password", preview: "Preview", radioGroup: "Radio Group", radio: "Radio", removeMessage: "Remove Element", removeOption: "Remove Option", remove: "&#215;", required: "Required", requireValidOption: "Only accept a pre-defined Option", richText: "Rich Text Editor", roles: "Access", rows: "Rows", save: "Save", selectOptions: "Options", select: "Select", selectColor: "Select Color", selectionsMessage: "Allow Multiple Selections", size: "Size", "size.xs": "Extra Small", "size.sm": "Small", "size.m": "Default", "size.lg": "Large", style: "Style", "styles.btn.default": "Default", "styles.btn.danger": "Danger", "styles.btn.info": "Info", "styles.btn.primary": "Primary", "styles.btn.success": "Success", "styles.btn.warning": "Warning", subtype: "Type", text: "Text Field", textArea: "Text Area", toggle: "Toggle", warning: "Warning!", value: "Value", viewJSON: "[{&hellip;}]", viewXML: "&lt;/&gt;", yes: "Yes" });
          const i = { actionButtons: [], allowStageSort: true, append: false, controlOrder: ["autocomplete", "button", "checkbox-group", "checkbox", "date", "file", "header", "hidden", "number", "paragraph", "radio-group", "select", "text", "textarea"], controlPosition: "right", dataType: "json", defaultFields: [], disabledActionButtons: [], disabledAttrs: [], disabledFieldButtons: {}, disabledSubtypes: {}, disableFields: [], disableHTMLLabels: false, disableInjectedStyle: false, editOnAdd: false, fields: [], fieldRemoveWarn: false, fieldEditContainer: null, inputSets: [], notify: { error: (e3) => {
            console.log(e3);
          }, success: (e3) => {
            console.log(e3);
          }, warning: (e3) => {
            console.warn(e3);
          } }, onAddField: (e3, t2) => t2, onAddFieldAfter: (e3, t2) => t2, onAddOption: (e3) => e3, onClearAll: n, onCloseFieldEdit: n, onOpenFieldEdit: n, onSave: n, persistDefaultFields: false, prepend: false, replaceFields: [], roles: { 1: "Administrator" }, scrollToFieldOnAdd: true, showActionButtons: true, sortableControls: false, stickyControls: { enable: true, offset: { top: 5, bottom: "auto", right: "auto" } }, subtypes: {}, templates: {}, typeUserAttrs: {}, typeUserDisabledAttrs: {}, typeUserEvents: {}, defaultGridColumnClass: "col-md-12", cancelGridModeDistance: 100, enableColumnInsertMenu: false, enableEnhancedBootstrapGrid: false }, l = { btn: ["default", "danger", "info", "primary", "success", "warning"] }, a = { location: "assets/lang/" }, s = {}, d = { rowWrapperClass: "rowWrapper", colWrapperClass: "colWrapper", tmpColWrapperClass: "tempColWrapper", tmpRowPlaceholderClass: "tempRowWrapper", invisibleRowPlaceholderClass: "invisibleRowPlaceholder" }, c = 333, u = "li.form-field";
        }, function(e2, t, r) {
          r.d(t, "d", function() {
            return o;
          }), r.d(t, "f", function() {
            return i;
          }), r.d(t, "b", function() {
            return l;
          }), r.d(t, "c", function() {
            return a;
          }), r.d(t, "e", function() {
            return s;
          }), r.d(t, "a", function() {
            return c;
          });
          const o = {}, n = { text: ["text", "password", "email", "color", "tel"], header: ["h1", "h2", "h3"], button: ["button", "submit", "reset"], paragraph: ["p", "address", "blockquote", "canvas", "output"], textarea: ["textarea", "quill"] }, i = (e3) => {
            e3.parentNode && e3.parentNode.removeChild(e3);
          }, l = (e3) => {
            for (; e3.firstChild; )
              e3.removeChild(e3.firstChild);
            return e3;
          }, a = (e3, t2, r2 = true) => {
            const o2 = [];
            let n2 = ["none", "block"];
            r2 && (n2 = n2.reverse());
            for (let r3 = e3.length - 1; r3 >= 0; r3--) {
              e3[r3].textContent.toLowerCase().indexOf(t2.toLowerCase()) !== -1 ? (e3[r3].style.display = n2[0], o2.push(e3[r3])) : e3[r3].style.display = n2[1];
            }
            return o2;
          }, s = ["select", "checkbox-group", "checkbox", "radio-group", "autocomplete"], d = new RegExp(`(${s.join("|")})`);
          class c {
            constructor(e3) {
              return this.optionFields = s, this.optionFieldsRegEx = d, this.subtypes = n, this.empty = l, this.filter = a, o[e3] = this, o[e3];
            }
            onRender(e3, t2) {
              e3.parentElement ? t2(e3) : window.requestAnimationFrame(() => this.onRender(e3, t2));
            }
          }
        }, function(e2, t, r) {
          function o(e3) {
            let t2;
            return typeof Event == "function" ? t2 = new Event(e3) : (t2 = document.createEvent("Event"), t2.initEvent(e3, true, true)), t2;
          }
          const n = { loaded: o("loaded"), viewData: o("viewData"), userDeclined: o("userDeclined"), modalClosed: o("modalClosed"), modalOpened: o("modalOpened"), formSaved: o("formSaved"), fieldAdded: o("fieldAdded"), fieldRemoved: o("fieldRemoved"), fieldRendered: o("fieldRendered"), fieldEditOpened: o("fieldEditOpened"), fieldEditClosed: o("fieldEditClosed") };
          t.a = n;
        }, function(e2, t, r) {
          r.d(t, "a", function() {
            return l;
          });
          var o = r(1), n = r(2), i = r.n(n);
          class l extends o.a {
            static register(e3 = {}, t2 = []) {
              l.customRegister = {}, l.def || (l.def = { icon: {}, i18n: {} }), l.templates = e3;
              const r2 = i.a.locale;
              l.def.i18n[r2] || (l.def.i18n[r2] = {}), o.a.register(Object.keys(e3), l);
              for (const n2 of t2) {
                let t3 = n2.type;
                if (n2.attrs = n2.attrs || {}, !t3) {
                  if (!n2.attrs.type) {
                    this.error("Ignoring invalid custom field definition. Please specify a type property.");
                    continue;
                  }
                  t3 = n2.attrs.type;
                }
                let i2 = n2.subtype || t3;
                if (!e3[t3]) {
                  const e4 = o.a.getClass(t3, n2.subtype);
                  if (!e4) {
                    this.error("Error while registering custom field: " + t3 + (n2.subtype ? ":" + n2.subtype : "") + ". Unable to find any existing defined control or template for rendering.");
                    continue;
                  }
                  i2 = n2.datatype ? n2.datatype : `${t3}-${Math.floor(9e3 * Math.random() + 1e3)}`, l.customRegister[i2] = jQuery.extend(n2, { type: t3, class: e4 });
                }
                l.def.i18n[r2][i2] = n2.label, l.def.icon[i2] = n2.icon;
              }
            }
            static getRegistered(e3 = false) {
              return e3 ? o.a.getRegistered(e3) : Object.keys(l.customRegister);
            }
            static lookup(e3) {
              return l.customRegister[e3];
            }
            static get definition() {
              return l.def;
            }
            build() {
              let e3 = l.templates[this.type];
              if (!e3)
                return this.error("Invalid custom control type. Please ensure you have registered it correctly as a template option.");
              const t2 = Object.assign(this.config), r2 = ["label", "description", "subtype", "id", "isPreview", "required", "title", "aria-required", "type"];
              for (const e4 of r2)
                t2[e4] = this.config[e4] || this[e4];
              return e3 = e3.bind(this), e3 = e3(t2), e3.js && (this.js = e3.js), e3.css && (this.css = e3.css), this.onRender = e3.onRender, { field: e3.field, layout: e3.layout };
            }
          }
          l.customRegister = {};
        }, function(e2) {
          e2.exports = JSON.parse('{"a":"formbuilder-icon-"}');
        }, function(e2, t, r) {
          e2.exports = function(e3) {
            var t2 = [];
            return t2.toString = function() {
              return this.map(function(t3) {
                var r2 = function(e4, t4) {
                  var r3 = e4[1] || "", o = e4[3];
                  if (!o)
                    return r3;
                  if (t4 && typeof btoa == "function") {
                    var n = (l = o, a = btoa(unescape(encodeURIComponent(JSON.stringify(l)))), s = "sourceMappingURL=data:application/json;charset=utf-8;base64,".concat(a), "/*# ".concat(s, " */")), i = o.sources.map(function(e5) {
                      return "/*# sourceURL=".concat(o.sourceRoot || "").concat(e5, " */");
                    });
                    return [r3].concat(i).concat([n]).join("\n");
                  }
                  var l, a, s;
                  return [r3].join("\n");
                }(t3, e3);
                return t3[2] ? "@media ".concat(t3[2], " {").concat(r2, "}") : r2;
              }).join("");
            }, t2.i = function(e4, r2, o) {
              typeof e4 == "string" && (e4 = [[null, e4, ""]]);
              var n = {};
              if (o)
                for (var i = 0; i < this.length; i++) {
                  var l = this[i][0];
                  l != null && (n[l] = true);
                }
              for (var a = 0; a < e4.length; a++) {
                var s = [].concat(e4[a]);
                o && n[s[0]] || (r2 && (s[2] ? s[2] = "".concat(r2, " and ").concat(s[2]) : s[2] = r2), t2.push(s));
              }
            }, t2;
          };
        }, function(e2, t, r) {
          var o, n = function() {
            return o === void 0 && (o = Boolean(window && document && document.all && !window.atob)), o;
          }, i = function() {
            var e3 = {};
            return function(t2) {
              if (e3[t2] === void 0) {
                var r2 = document.querySelector(t2);
                if (window.HTMLIFrameElement && r2 instanceof window.HTMLIFrameElement)
                  try {
                    r2 = r2.contentDocument.head;
                  } catch (e4) {
                    r2 = null;
                  }
                e3[t2] = r2;
              }
              return e3[t2];
            };
          }(), l = [];
          function a(e3) {
            for (var t2 = -1, r2 = 0; r2 < l.length; r2++)
              if (l[r2].identifier === e3) {
                t2 = r2;
                break;
              }
            return t2;
          }
          function s(e3, t2) {
            for (var r2 = {}, o2 = [], n2 = 0; n2 < e3.length; n2++) {
              var i2 = e3[n2], s2 = t2.base ? i2[0] + t2.base : i2[0], d2 = r2[s2] || 0, c2 = "".concat(s2, " ").concat(d2);
              r2[s2] = d2 + 1;
              var u2 = a(c2), f2 = { css: i2[1], media: i2[2], sourceMap: i2[3] };
              u2 !== -1 ? (l[u2].references++, l[u2].updater(f2)) : l.push({ identifier: c2, updater: h(f2, t2), references: 1 }), o2.push(c2);
            }
            return o2;
          }
          function d(e3) {
            var t2 = document.createElement("style"), o2 = e3.attributes || {};
            if (o2.nonce === void 0) {
              var n2 = r.nc;
              n2 && (o2.nonce = n2);
            }
            if (Object.keys(o2).forEach(function(e4) {
              t2.setAttribute(e4, o2[e4]);
            }), typeof e3.insert == "function")
              e3.insert(t2);
            else {
              var l2 = i(e3.insert || "head");
              if (!l2)
                throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
              l2.appendChild(t2);
            }
            return t2;
          }
          var c, u = (c = [], function(e3, t2) {
            return c[e3] = t2, c.filter(Boolean).join("\n");
          });
          function f(e3, t2, r2, o2) {
            var n2 = r2 ? "" : o2.media ? "@media ".concat(o2.media, " {").concat(o2.css, "}") : o2.css;
            if (e3.styleSheet)
              e3.styleSheet.cssText = u(t2, n2);
            else {
              var i2 = document.createTextNode(n2), l2 = e3.childNodes;
              l2[t2] && e3.removeChild(l2[t2]), l2.length ? e3.insertBefore(i2, l2[t2]) : e3.appendChild(i2);
            }
          }
          function p(e3, t2, r2) {
            var o2 = r2.css, n2 = r2.media, i2 = r2.sourceMap;
            if (n2 ? e3.setAttribute("media", n2) : e3.removeAttribute("media"), i2 && btoa && (o2 += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i2)))), " */")), e3.styleSheet)
              e3.styleSheet.cssText = o2;
            else {
              for (; e3.firstChild; )
                e3.removeChild(e3.firstChild);
              e3.appendChild(document.createTextNode(o2));
            }
          }
          var m = null, b = 0;
          function h(e3, t2) {
            var r2, o2, n2;
            if (t2.singleton) {
              var i2 = b++;
              r2 = m || (m = d(t2)), o2 = f.bind(null, r2, i2, false), n2 = f.bind(null, r2, i2, true);
            } else
              r2 = d(t2), o2 = p.bind(null, r2, t2), n2 = function() {
                !function(e4) {
                  if (e4.parentNode === null)
                    return false;
                  e4.parentNode.removeChild(e4);
                }(r2);
              };
            return o2(e3), function(t3) {
              if (t3) {
                if (t3.css === e3.css && t3.media === e3.media && t3.sourceMap === e3.sourceMap)
                  return;
                o2(e3 = t3);
              } else
                n2();
            };
          }
          e2.exports = function(e3, t2) {
            (t2 = t2 || {}).singleton || typeof t2.singleton == "boolean" || (t2.singleton = n());
            var r2 = s(e3 = e3 || [], t2);
            return function(e4) {
              if (e4 = e4 || [], Object.prototype.toString.call(e4) === "[object Array]") {
                for (var o2 = 0; o2 < r2.length; o2++) {
                  var n2 = a(r2[o2]);
                  l[n2].references--;
                }
                for (var i2 = s(e4, t2), d2 = 0; d2 < r2.length; d2++) {
                  var c2 = a(r2[d2]);
                  l[c2].references === 0 && (l[c2].updater(), l.splice(c2, 1));
                }
                r2 = i2;
              }
            };
          };
        }, function(e2, t, r) {
          r.d(t, "a", function() {
            return i;
          });
          var o = r(0);
          const n = (e3, t2) => {
            let r2 = e3.id ? `formbuilder-${e3.type} form-group field-${e3.id}` : "";
            if (e3.className) {
              const n2 = Object(o.m)(e3.className);
              n2 && n2.length > 0 && (r2 += " " + n2.join(" ")), t2.classList && t2.classList.remove(...n2);
            }
            return r2;
          };
          class i {
            constructor(e3, t2) {
              this.preview = t2, this.templates = { label: null, help: null, default: (e4, t3, r2, o2) => (r2 && t3.appendChild(r2), this.markup("div", [t3, e4], { className: n(o2, e4) })), noLabel: (e4, t3, r2, o2) => this.markup("div", e4, { className: n(o2, e4) }), hidden: (e4) => e4 }, e3 && (this.templates = jQuery.extend(this.templates, e3)), this.configure();
            }
            configure() {
            }
            build(e3, t2, r2) {
              this.preview && (t2.name ? t2.name = t2.name + "-preview" : t2.name = o.g.nameAttr(t2) + "-preview"), t2.id = t2.name, this.data = jQuery.extend({}, t2);
              const n2 = new e3(t2, this.preview);
              let i2 = n2.build();
              typeof i2 == "object" && i2.field || (i2 = { field: i2 });
              const l = this.label(), a = this.help();
              let s;
              s = r2 && this.isTemplate(r2) ? r2 : this.isTemplate(i2.layout) ? i2.layout : "default";
              const d = this.processTemplate(s, i2.field, l, a);
              return n2.on("prerender")(d), d.addEventListener("fieldRendered", n2.on("render")), d;
            }
            label() {
              const e3 = this.data.label || "", t2 = [o.g.parsedHtml(e3)];
              return this.data.required && t2.push(this.markup("span", "*", { className: "formbuilder-required" })), this.isTemplate("label") ? this.processTemplate("label", t2) : this.markup("label", t2, { for: this.data.id, className: `formbuilder-${this.data.type}-label` });
            }
            help() {
              return this.data.description ? this.isTemplate("help") ? this.processTemplate("help", this.data.description) : this.markup("span", "?", { className: "tooltip-element", tooltip: this.data.description }) : null;
            }
            isTemplate(e3) {
              return typeof this.templates[e3] == "function";
            }
            processTemplate(e3, ...t2) {
              let r2 = this.templates[e3](...t2, this.data);
              return r2.jquery && (r2 = r2[0]), r2;
            }
            markup(e3, t2 = "", r2 = {}) {
              return o.g.markup(e3, t2, r2);
            }
          }
        }, function(e2, t) {
          e2.exports = function(e3) {
            var t2 = typeof e3;
            return e3 != null && (t2 == "object" || t2 == "function");
          };
        }, function(t, r, o) {
          var n = o(1), i = o(4);
          function l(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          class a extends n.a {
            static get definition() {
              return { mi18n: { requireValidOption: "requireValidOption" } };
            }
            build() {
              const e2 = this.config, { values: t2, type: r2 } = e2, o2 = l(e2, ["values", "type"]), n2 = (e3) => {
                const t3 = e3.target.nextSibling.nextSibling, r3 = e3.target.nextSibling, o3 = this.getActiveOption(t3);
                let n3 = (/* @__PURE__ */ new Map([[38, () => {
                  const e4 = this.getPreviousOption(o3);
                  e4 && this.selectOption(t3, e4);
                }], [40, () => {
                  const e4 = this.getNextOption(o3);
                  e4 && this.selectOption(t3, e4);
                }], [13, () => {
                  o3 ? (e3.target.value = o3.innerHTML, r3.value = o3.getAttribute("value"), t3.style.display === "none" ? this.showList(t3, o3) : this.hideList(t3)) : this.config.requireValidOption && (this.isOptionValid(t3, e3.target.value) || (e3.target.value = "", e3.target.nextSibling.value = "")), e3.preventDefault();
                }], [27, () => {
                  this.hideList(t3);
                }]])).get(e3.keyCode);
                return n3 || (n3 = () => false), n3();
              }, a2 = { focus: (e3) => {
                const t3 = e3.target.nextSibling.nextSibling, r3 = Object(i.c)(t3.querySelectorAll("li"), e3.target.value);
                if (e3.target.addEventListener("keydown", n2), e3.target.value.length > 0) {
                  const e4 = r3.length > 0 ? r3[r3.length - 1] : null;
                  this.showList(t3, e4);
                }
              }, blur: (e3) => {
                e3.target.removeEventListener("keydown", n2);
                const t3 = setTimeout(() => {
                  e3.target.nextSibling.nextSibling.style.display = "none", clearTimeout(t3);
                }, 200);
                if (this.config.requireValidOption) {
                  const t4 = e3.target.nextSibling.nextSibling;
                  this.isOptionValid(t4, e3.target.value) || (e3.target.value = "", e3.target.nextSibling.value = "");
                }
              }, input: (e3) => {
                const t3 = e3.target.nextSibling.nextSibling;
                e3.target.nextSibling.value = e3.target.value;
                const r3 = Object(i.c)(t3.querySelectorAll("li"), e3.target.value);
                if (r3.length == 0)
                  this.hideList(t3);
                else {
                  let e4 = this.getActiveOption(t3);
                  e4 || (e4 = r3[r3.length - 1]), this.showList(t3, e4);
                }
              } }, s2 = Object.assign({}, o2, { id: o2.id + "-input", autocomplete: "off", events: a2 }), d2 = Object.assign({}, o2, { type: "hidden" });
              delete s2.name;
              const c2 = [this.markup("input", null, s2), this.markup("input", null, d2)], u2 = t2.map((e3) => {
                const t3 = e3.label, r3 = { events: { click: (t4) => {
                  const r4 = t4.target.parentElement, o3 = r4.previousSibling.previousSibling;
                  o3.value = e3.label, o3.nextSibling.value = e3.value, this.hideList(r4);
                } }, value: e3.value };
                return this.markup("li", t3, r3);
              });
              return c2.push(this.markup("ul", u2, { id: o2.id + "-list", className: `formbuilder-${r2}-list` })), c2;
            }
            hideList(e2) {
              this.selectOption(e2, null), e2.style.display = "none";
            }
            showList(e2, t2) {
              this.selectOption(e2, t2), e2.style.display = "block", e2.style.width = e2.parentElement.offsetWidth + "px";
            }
            getActiveOption(e2) {
              const t2 = e2.getElementsByClassName("active-option")[0];
              return t2 && t2.style.display !== "none" ? t2 : null;
            }
            getPreviousOption(e2) {
              let t2 = e2;
              do {
                t2 = t2 ? t2.previousSibling : null;
              } while (t2 != null && t2.style.display === "none");
              return t2;
            }
            getNextOption(e2) {
              let t2 = e2;
              do {
                t2 = t2 ? t2.nextSibling : null;
              } while (t2 != null && t2.style.display === "none");
              return t2;
            }
            selectOption(e2, t2) {
              const r2 = e2.querySelectorAll("li");
              for (let e3 = 0; e3 < r2.length; e3++)
                r2[e3].classList.remove("active-option");
              t2 && t2.classList.add("active-option");
            }
            isOptionValid(e2, t2) {
              const r2 = e2.querySelectorAll("li");
              let o2 = false;
              for (let e3 = 0; e3 < r2.length; e3++)
                if (r2[e3].innerHTML === t2) {
                  o2 = true;
                  break;
                }
              return o2;
            }
            onRender(t2) {
              if (this.config.userData) {
                const t3 = e("#" + this.config.name), r2 = t3.next(), o2 = this.config.userData[0];
                let n2 = null;
                if (r2.find("li").each(function() {
                  e(this).attr("value") !== o2 || (n2 = e(this).get(0));
                }), n2 === null)
                  return this.config.requireValidOption ? void 0 : void t3.prev().val(this.config.userData[0]);
                t3.prev().val(n2.innerHTML), t3.val(n2.getAttribute("value"));
                const i2 = t3.next().get(0);
                i2.style.display === "none" ? this.showList(i2, n2) : this.hideList(i2);
              }
              return t2;
            }
          }
          n.a.register("autocomplete", a);
          class s extends n.a {
            build() {
              return { field: this.markup("button", this.label, this.config), layout: "noLabel" };
            }
          }
          n.a.register("button", s), n.a.register(["button", "submit", "reset"], s, "button");
          var d = o(6);
          class c extends n.a {
            build() {
              return { field: this.markup("input", null, this.config), layout: "hidden" };
            }
            onRender() {
              this.config.userData && e("#" + this.config.name).val(this.config.userData[0]);
            }
          }
          n.a.register("hidden", c);
          var u = o(0);
          function f(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          class p extends n.a {
            build() {
              const e2 = this.config, { type: t2 } = e2, r2 = f(e2, ["type"]);
              let o2 = t2;
              const n2 = { paragraph: "p", header: this.subtype };
              return n2[t2] && (o2 = n2[t2]), { field: this.markup(o2, u.g.parsedHtml(this.label), r2), layout: "noLabel" };
            }
          }
          function m(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          n.a.register(["paragraph", "header"], p), n.a.register(["p", "address", "blockquote", "canvas", "output"], p, "paragraph"), n.a.register(["h1", "h2", "h3", "h4", "h5", "h6"], p, "header");
          class b extends n.a {
            static get definition() {
              return { inactive: ["checkbox"], mi18n: { minSelectionRequired: "minSelectionRequired" } };
            }
            build() {
              const e2 = [], t2 = this.config, { values: r2, value: o2, placeholder: n2, type: i2, inline: l2, other: a2, toggle: s2 } = t2, d2 = m(t2, ["values", "value", "placeholder", "type", "inline", "other", "toggle"]), c2 = i2.replace("-group", ""), f2 = i2 === "select";
              if ((d2.multiple || i2 === "checkbox-group") && (d2.name = d2.name + "[]"), i2 === "checkbox-group" && d2.required) {
                const e3 = this, t3 = this.onRender.bind(this);
                this.onRender = function() {
                  t3(), e3.groupRequired();
                };
              }
              if (delete d2.title, r2) {
                n2 && f2 && e2.push(this.markup("option", n2, { disabled: null, selected: null }));
                for (let t3 = 0; t3 < r2.length; t3++) {
                  let i3 = r2[t3];
                  typeof i3 == "string" && (i3 = { label: i3, value: i3 });
                  const { label: a3 = "" } = i3, u2 = m(i3, ["label"]);
                  if (u2.id = `${d2.id}-${t3}`, u2.selected && !n2 || delete u2.selected, o2 !== void 0 && u2.value === o2 && (u2.selected = true), f2) {
                    const t4 = this.markup("option", document.createTextNode(a3), u2);
                    e2.push(t4);
                  } else {
                    const t4 = [a3];
                    let r3 = "formbuilder-" + c2;
                    l2 && (r3 += "-inline"), u2.type = c2, u2.selected && (u2.checked = "checked", delete u2.selected);
                    const o3 = this.markup("input", null, Object.assign({}, d2, u2)), n3 = { for: u2.id };
                    let i4 = [o3, this.markup("label", t4, n3)];
                    s2 && (n3.className = "kc-toggle", t4.unshift(o3, this.markup("span")), i4 = this.markup("label", t4, n3));
                    const f3 = this.markup("div", i4, { className: r3 });
                    e2.push(f3);
                  }
                }
                if (!f2 && a2) {
                  const t3 = { id: d2.id + "-other", className: d2.className + " other-option", value: "" };
                  let r3 = "formbuilder-" + c2;
                  l2 && (r3 += "-inline");
                  const o3 = Object.assign({}, d2, t3);
                  o3.type = c2;
                  const n3 = { type: "text", events: { input: (e3) => {
                    const t4 = e3.target, r4 = t4.parentElement.previousElementSibling;
                    r4.value = t4.value, r4.name = d2.id + "[]";
                  } }, id: t3.id + "-value", className: "other-val" }, i3 = this.markup("input", null, o3), a3 = [document.createTextNode("Other"), this.markup("input", null, n3)], s3 = this.markup("label", a3, { for: o3.id }), u2 = this.markup("div", [i3, s3], { className: r3 });
                  e2.push(u2);
                }
              }
              return this.dom = i2 == "select" ? this.markup(c2, e2, Object(u.D)(d2, true)) : this.markup("div", e2, { className: i2 }), this.dom;
            }
            groupRequired() {
              const e2 = this.element.getElementsByTagName("input"), t2 = (e3, t3) => {
                [].forEach.call(e3, (e4) => {
                  t3 ? e4.removeAttribute("required") : e4.setAttribute("required", "required"), ((e5, t4) => {
                    const r3 = n.a.mi18n("minSelectionRequired", 1);
                    t4 ? e5.setCustomValidity("") : e5.setCustomValidity(r3);
                  })(e4, t3);
                });
              }, r2 = () => {
                const r3 = [].some.call(e2, (e3) => e3.checked);
                t2(e2, r3);
              };
              for (let t3 = e2.length - 1; t3 >= 0; t3--)
                e2[t3].addEventListener("change", r2);
              r2();
            }
            onRender() {
              if (this.config.userData) {
                const t2 = this.config.userData.slice();
                this.config.type === "select" ? e(this.dom).val(t2).prop("selected", true) : this.config.type.endsWith("-group") && this.dom.querySelectorAll("input").forEach((e2) => {
                  if (!e2.classList.contains("other-val")) {
                    for (let r2 = 0; r2 < t2.length; r2++)
                      if (e2.value === t2[r2]) {
                        e2.setAttribute("checked", "checked"), t2.splice(r2, 1);
                        break;
                      }
                    if (e2.id.endsWith("-other")) {
                      const r2 = document.getElementById(e2.id + "-value");
                      if (t2.length === 0)
                        return;
                      e2.setAttribute("checked", "checked"), r2.value = e2.value = t2[0], r2.style.display = "inline-block";
                    }
                  }
                });
              }
            }
          }
          n.a.register(["select", "checkbox-group", "radio-group", "checkbox"], b);
          class h extends n.a {
            static get definition() {
              return { mi18n: { date: "dateField", file: "fileUpload" } };
            }
            build() {
              let { name: e2 } = this.config;
              e2 = this.config.multiple ? e2 + "[]" : e2;
              const t2 = Object.assign({}, this.config, { name: e2 });
              return this.dom = this.markup("input", null, t2), this.dom;
            }
            onRender() {
              this.config.userData && e(this.dom).val(this.config.userData[0]);
            }
          }
          n.a.register(["text", "file", "date", "number"], h), n.a.register(["text", "password", "email", "color", "tel"], h, "text");
          class g extends h {
            static get definition() {
              return { i18n: { default: "Fine Uploader" } };
            }
            configure() {
              this.js = this.classConfig.js || "//cdnjs.cloudflare.com/ajax/libs/file-uploader/5.14.2/jquery.fine-uploader/jquery.fine-uploader.min.js", this.css = [this.classConfig.css || "//cdnjs.cloudflare.com/ajax/libs/file-uploader/5.14.2/jquery.fine-uploader/fine-uploader-gallery.min.css", { type: "inline", id: "fineuploader-inline", style: "\n          .qq-uploader .qq-error-message {\n            position: absolute;\n            left: 20%;\n            top: 20px;\n            width: 60%;\n            color: #a94442;\n            background: #f2dede;\n            border: solid 1px #ebccd1;\n            padding: 15px;\n            line-height: 1.5em;\n            text-align: center;\n            z-index: 99999;\n          }\n          .qq-uploader .qq-error-message span {\n            display: inline-block;\n            text-align: left;\n          }" }], this.handler = this.classConfig.handler || "/upload";
              ["js", "css", "handler"].forEach((e2) => delete this.classConfig[e2]);
              const t2 = this.classConfig.template || '\n      <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">\n        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">\n          <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>\n        </div>\n        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>\n          <span class="qq-upload-drop-area-text-selector"></span>\n        </div>\n        <div class="qq-upload-button-selector qq-upload-button">\n          <div>Upload a file</div>\n        </div>\n        <span class="qq-drop-processing-selector qq-drop-processing">\n          <span>Processing dropped files...</span>\n          <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>\n        </span>\n        <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">\n          <li>\n            <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>\n            <div class="qq-progress-bar-container-selector qq-progress-bar-container">\n              <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>\n            </div>\n            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>\n            <div class="qq-thumbnail-wrapper">\n              <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>\n            </div>\n            <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>\n            <button type="button" class="qq-upload-retry-selector qq-upload-retry">\n              <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>\n              Retry\n            </button>\n            <div class="qq-file-info">\n              <div class="qq-file-name">\n                <span class="qq-upload-file-selector qq-upload-file"></span>\n                <span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>\n              </div>\n              <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">\n              <span class="qq-upload-size-selector qq-upload-size"></span>\n              <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">\n                <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>\n              </button>\n              <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">\n                <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>\n              </button>\n              <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">\n                <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>\n              </button>\n            </div>\n          </li>\n        </ul>\n        <dialog class="qq-alert-dialog-selector">\n          <div class="qq-dialog-message-selector"></div>\n          <div class="qq-dialog-buttons">\n            <button type="button" class="qq-cancel-button-selector">Close</button>\n          </div>\n        </dialog>\n        <dialog class="qq-confirm-dialog-selector">\n          <div class="qq-dialog-message-selector"></div>\n          <div class="qq-dialog-buttons">\n            <button type="button" class="qq-cancel-button-selector">No</button>\n            <button type="button" class="qq-ok-button-selector">Yes</button>\n          </div>\n        </dialog>\n        <dialog class="qq-prompt-dialog-selector">\n          <div class="qq-dialog-message-selector"></div>\n          <input type="text">\n          <div class="qq-dialog-buttons">\n            <button type="button" class="qq-cancel-button-selector">Cancel</button>\n            <button type="button" class="qq-ok-button-selector">Ok</button>\n          </div>\n        </dialog>\n      </div>';
              this.fineTemplate = e("<div/>").attr("id", "qq-template").html(t2);
            }
            build() {
              return this.input = this.markup("input", null, { type: "hidden", name: this.config.name, id: this.config.name }), this.wrapper = this.markup("div", "", { id: this.config.name + "-wrapper" }), [this.input, this.wrapper];
            }
            onRender() {
              const t2 = e(this.wrapper), r2 = e(this.input), o2 = jQuery.extend(true, { request: { endpoint: this.handler }, deleteFile: { enabled: true, endpoint: this.handler }, chunking: { enabled: true, concurrent: { enabled: true }, success: { endpoint: this.handler + (this.handler.indexOf("?") == -1 ? "?" : "&") + "done" } }, resume: { enabled: true }, retry: { enableAuto: true, showButton: true }, callbacks: { onError: (r3, o3, n2) => {
                n2.slice(-1) != "." && (n2 += ".");
                const i2 = e("<div />").addClass("qq-error-message").html(`<span>Error processing upload: <b>${o3}</b>.<br />Reason: ${n2}</span>`).prependTo(t2.find(".qq-uploader")), l2 = window.setTimeout(() => {
                  i2.fadeOut(() => {
                    i2.remove(), window.clearTimeout(l2);
                  });
                }, 6e3);
                return r3;
              }, onStatusChange: (e2, o3, n2) => {
                const i2 = t2.fineUploader("getUploads"), l2 = [];
                for (const e3 of i2)
                  e3.status == "upload successful" && l2.push(e3.name);
                return r2.val(l2.join(", ")), { id: e2, oldStatus: o3, newStatus: n2 };
              } }, template: this.fineTemplate }, this.classConfig);
              t2.fineUploader(o2);
            }
          }
          function y(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          h.register("file", h, "file"), h.register("fineuploader", g, "file");
          class w extends n.a {
            static get definition() {
              return { mi18n: { textarea: "textArea" } };
            }
            build() {
              const e2 = this.config, { value: t2 = "" } = e2, r2 = y(e2, ["value"]);
              return delete r2.type, this.field = this.markup("textarea", this.parsedHtml(t2), r2), this.field;
            }
            onRender() {
              this.config.userData && e("#" + this.config.name).val(this.config.userData[0]);
            }
            on(t2) {
              return t2 == "prerender" && this.preview ? (t3) => {
                this.field && (t3 = this.field), e(t3).on("mousedown", (e2) => {
                  e2.stopPropagation();
                });
              } : super.on(t2);
            }
          }
          function v(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          n.a.register("textarea", w), n.a.register("textarea", w, "textarea");
          class x extends w {
            configure() {
              if (this.js = ["https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js"], this.classConfig.js) {
                let e2 = this.classConfig.js;
                Array.isArray(e2) || (e2 = new Array(e2)), this.js.concat(e2), delete this.classConfig.js;
              }
              this.classConfig.css && (this.css = this.classConfig.css), this.editorOptions = { height: 250, paste_data_images: true, plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"], toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | table" };
            }
            build() {
              const e2 = this.config, { value: t2 = "" } = e2, r2 = v(e2, ["value"]);
              return delete r2.type, this.field = this.markup("textarea", this.parsedHtml(t2), r2), r2.disabled && (this.editorOptions.readonly = true), this.field;
            }
            onRender(e2) {
              window.tinymce.editors[this.id] && window.tinymce.editors[this.id].remove();
              const t2 = jQuery.extend(this.editorOptions, this.classConfig);
              if (t2.target = this.field, setTimeout(() => {
                window.tinymce.init(t2);
              }, 100), this.config.userData && window.tinymce.editors[this.id].setContent(this.parsedHtml(this.config.userData[0])), window.lastFormBuilderCopiedTinyMCE) {
                const e3 = setTimeout(() => {
                  window.tinymce.editors[this.id].setContent(this.parsedHtml(window.lastFormBuilderCopiedTinyMCE)), window.lastFormBuilderCopiedTinyMCE = null, clearTimeout(e3);
                }, 300);
              }
              return e2;
            }
          }
          function A(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          function O(e2, t2) {
            var r2 = Object.keys(e2);
            if (Object.getOwnPropertySymbols) {
              var o2 = Object.getOwnPropertySymbols(e2);
              t2 && (o2 = o2.filter(function(t3) {
                return Object.getOwnPropertyDescriptor(e2, t3).enumerable;
              })), r2.push.apply(r2, o2);
            }
            return r2;
          }
          function C(e2) {
            for (var t2 = 1; t2 < arguments.length; t2++) {
              var r2 = arguments[t2] != null ? arguments[t2] : {};
              t2 % 2 ? O(Object(r2), true).forEach(function(t3) {
                j(e2, t3, r2[t3]);
              }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e2, Object.getOwnPropertyDescriptors(r2)) : O(Object(r2)).forEach(function(t3) {
                Object.defineProperty(e2, t3, Object.getOwnPropertyDescriptor(r2, t3));
              });
            }
            return e2;
          }
          function j(e2, t2, r2) {
            return t2 in e2 ? Object.defineProperty(e2, t2, { value: r2, enumerable: true, configurable: true, writable: true }) : e2[t2] = r2, e2;
          }
          w.register("tinymce", x, "textarea");
          class k extends w {
            configure() {
              const e2 = { modules: { toolbar: [[{ header: [1, 2, false] }], ["bold", "italic", "underline"], ["code-block"]] }, placeholder: this.config.placeholder || "", theme: "snow" }, [t2, r2] = u.g.splitObject(this.classConfig, ["css", "js"]);
              Object.assign(this, C(C({}, { js: "//cdn.quilljs.com/1.2.4/quill.js", css: "//cdn.quilljs.com/1.2.4/quill.snow.css" }), t2)), this.editorConfig = C(C({}, e2), r2);
            }
            build() {
              const e2 = this.config, { value: t2 = "" } = e2, r2 = A(e2, ["value"]);
              return delete r2.type, this.field = this.markup("div", null, r2), this.field;
            }
            onRender(e2) {
              const t2 = this.config.value || "", r2 = window.Quill.import("delta");
              window.fbEditors.quill[this.id] = {};
              const o2 = window.fbEditors.quill[this.id];
              return o2.instance = new window.Quill(this.field, this.editorConfig), o2.data = new r2(), t2 && o2.instance.setContents(window.JSON.parse(this.parsedHtml(t2))), o2.instance.on("text-change", function(e3) {
                o2.data = o2.data.compose(e3);
              }), e2;
            }
          }
          w.register("quill", k, "textarea");
          d.a;
        }, function(e2, t, r) {
          var o = r(20), n = typeof self == "object" && self && self.Object === Object && self, i = o || n || Function("return this")();
          e2.exports = i;
        }, function(e2, t, r) {
          var o = r(13).Symbol;
          e2.exports = o;
        }, function(e2, t, r) {
          var o = r(18), n = r(11);
          e2.exports = function(e3, t2, r2) {
            var i = true, l = true;
            if (typeof e3 != "function")
              throw new TypeError("Expected a function");
            return n(r2) && (i = "leading" in r2 ? !!r2.leading : i, l = "trailing" in r2 ? !!r2.trailing : l), o(e3, t2, { leading: i, maxWait: t2, trailing: l });
          };
        }, function(e2, t, r) {
          var o = r(9), n = r(17);
          typeof (n = n.__esModule ? n.default : n) == "string" && (n = [[e2.i, n, ""]]);
          var i = { attributes: { class: "formBuilder-injected-style" }, insert: "head", singleton: false };
          o(n, i);
          e2.exports = n.locals || {};
        }, function(e2, t, r) {
          r.r(t);
          var o = r(8), n = r.n(o)()(false);
          n.push([e2.i, `@font-face{font-family:"formbuilder-icons";src:url("data:application/octet-stream;base64,d09GRgABAAAAABu0AA8AAAAAMegAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABHU1VCAAABWAAAADsAAABUIIslek9TLzIAAAGUAAAAQwAAAFY+IFQTY21hcAAAAdgAAACqAAACbnpHyFBjdnQgAAAChAAAABMAAAAgBtX/BGZwZ20AAAKYAAAFkAAAC3CKkZBZZ2FzcAAACCgAAAAIAAAACAAAABBnbHlmAAAIMAAAEA4AAByklMHRx2hlYWQAABhAAAAAMwAAADYZ1vNNaGhlYQAAGHQAAAAdAAAAJAc8A2VobXR4AAAYlAAAACEAAABMRoz//2xvY2EAABi4AAAAKAAAAChJjFGYbWF4cAAAGOAAAAAgAAAAIAKGDJhuYW1lAAAZAAAAAZkAAAM5OICt5nBvc3QAABqcAAAAmwAAAN59hsARcHJlcAAAGzgAAAB6AAAAhuVBK7x4nGNgZGBg4GIwYLBjYHJx8wlh4MtJLMljkGJgYYAAkDwymzEnMz2RgQPGA8qxgGkOIGaDiAIAJjsFSAB4nGNgZN7OOIGBlYGBqYppDwMDQw+EZnzAYMjIBBRlYGVmwAoC0lxTGA68YPjkyxz0P4shijmIYRpQmBEkBwAMiQy7AHic7ZHLFYJADEXvAOIP5FOCC1e2ws6CXFlr1jSgL5OUYTiXScIMcHKBA9CKp+igfCh4vNUttd9yqf2Ol+qTrgZstGXfvl9l2BRZjaLndx41a3S20xd6juqe9Z4rAyM3JmYWVm3q+cdQ75bVGmktZcCSOvXEjVni1ixxm5Zo6lii+WOJTGCJnGCJW7ZEnrDE/84SuZP5QBZlPsDXOcDXJZBj9i1g/QFjZzHOAAB4nGNgQAMSEMgc9D8LhAESbAPdAHicrVZpd9NGFB15SZyELCULLWphxMRpsEYmbMGACUGyYyBdnK2VoIsUO+m+8Ynf4F/zZNpz6Dd+Wu8bLySQtOdwmpOjd+fN1czbZRJaktgL65GUmy/F1NYmjew8CemGTctRfCg7eyFlisnfBVEQrZbatx2HREQiULWusEQQ+x5ZmmR86FFGy7akV03KLT3pLlvjQb1V334aOsqxO6GkZjN0aD2yJVUYVaJIpj1S0qZlqPorSSu8v8LMV81QwohOImm8GcbQSN4bZ7TKaDW24yiKbLLcKFIkmuFBFHmU1RLn5IoJDMoHzZDyyqcR5cP8iKzYo5xWsEu20/y+L3mndzk/sV9vUbbkQB/Ijuzg7HQlX4RbW2HctJPtKFQRdtd3QmzZ7FT/Zo/ymkYDtysyvdCMYKl8hRArP6HM/iFZLZxP+ZJHo1qykRNB62VO7Es+gdbjiClxzRhZ0N3RCRHU/ZIzDPaYPh788d4plgsTAngcy3pHJZwIEylhczRJ2jByYCVliyqp9a6YOOV1WsRbwn7t2tGXzmjjUHdiPFsPHVs5UcnxaFKnmUyd2knNoykNopR0JnjMrwMoP6JJXm1jNYmVR9M4ZsaERCICLdxLU0EsO7GkKQTNoxm9uRumuXYtWqTJA/Xco/f05la4udNT2g70s0Z/VqdiOtgL0+lp5C/xadrlIkXp+ukZfkziQdYCMpEtNsOUgwdv/Q7Sy9eWHIXXBtju7fMrqH3WRPCkAfsb0B5P1SkJTIWYVYhWQGKta1mWydWsFqnI1HdDmla+rNMEinIcF8e+jHH9XzMzlpgSvt+J07MjLj1z7UsI0xx8m3U9mtepxXIBcWZ5TqdZlu/rNMfyA53mWZ7X6QhLW6ejLD/UaYHlRzodY3lBC5p038GQizDkAg6QMISlA0NYXoIhLBUMYbkIQ1gWYQjLJRjC8mMYwnIZhrC8rGXV1FNJ49qZWAZsQmBijh65zEXlaiq5VEK7aFRqQ54SbpVUFM+qf2WgXjzyhjmwFkiXyJpfMc6Vj0bl+NYVLW8aO1fAsepvH472OfFS1ouFPwX/1dZUJb1izcOTq/Abhp5sJ6o2qXh0TZfPVT26/l9UVFgL9BtIhVgoyrJscGcihI86nYZqoJVDzGzMPLTrdcuan8P9NzFCFlD9+DcUGgvcg05ZSVnt4KzV19uy3DuDcjgTLEkxN/P6VvgiI7PSfpFZyp6PfB5wBYxKZdhqA60VvNknMQ+Z3iTPBHFbUTZI2tjOBIkNHPOAefOdBCZh6qoN5E7hhg34BWFuwXknXKJ6oyyH7kXs8yik/Fun4kT2qGiMwLPZG2Gv70LKb3EMJDT5pX4MVBWhqRg1FdA0Um6oBl/G2bptQsYO9CMqdsOyrOLDxxb3lZJtGYR8pIjVo6Of1l6iTqrcfmYUl++dvgXBIDUxf3vfdHGQyrtayTJHbQNTtxqVU9eaQ+NVh+rmUfW94+wTOWuabronHnpf06rbwcVcLLD2bQ7SUiYX1PVhhQ2iy8WlUOplNEnvuAcYFhjQ71CKjf+r+th8nitVhdFxJN9O1LfR52AM/A/Yf0f1A9D3Y+hyDS7P95oTn2704WyZrqIX66foNzBrrblZugbc0HQD4iFHrY64yg18pwZxeqS5HOkh4GPdFeIBwCaAxeAT3bWM5lMAo/mMOT7A58xh0GQOgy3mMNhmzhrADnMY7DKHwR5zGHzBnHWAL5nDIGQOg4g5DJ4wJwB4yhwGXzGHwdfMYfANc+4DfMscBjFzGCTMYbCv6dYwzC1e0F2gtkFVoANTT1jcw+JQU2XI/o4Xhv29Qcz+wSCm/qjp9pD6Ey8M9WeDmPqLQUz9VdOdIfU3Xhjq7wYx9Q+DmPpMvxjLZQa/jHyXCgeUXWw+5++J9w/bxUC5AAEAAf//AA94nM1ZW3Bbx3nef88VwMEBDnAO7iAuBxcRoEQKV0qkAEiiREqkJJKmJFKyQNY0HVc0TSlJq9ox7TZynKgvrmcqT6dR22EznXGcTOvIE+fB6kynkpt6PHamje126pdOXyq/+KHNS2EB6r+40KwkZ9xkPJPF2QvP7v5nd//b9y+Jk5C757nb3CzhiERsxEHcxEuCJEJMkiZZMkmmyRyZJ8/Q0cnX9On52ks8UHOHSVesICcTSTmxRhKZZCKzGoOIZ8ATWSED0ejAsu7WOEdYDTtWDJeTU/v61OUQ+PrBpD5ziexID9kHeYnskOoCR4nNQkEkUE8pVCRJWUzWd0FmZ5Z6IhnPYi6+m4uSsCMaXgyC3x84RQIBZYL09XkXiNdr9x4JTr5m4ML+uLuwHWufs7KBtQcvLaz2rX5pa6u9/IWW5RmIrm6tS1378he2sFA7f/LkzIzPpyhP/96l3/2dr3/tqxfXzz/+lcdWHl1+5LeWFuvnzp6cPzl/+tTM3MzcQ7PTJ45PHRk/fGjs4IH9tcpwMTeUzfTvSKeSCTMei0b6wiFf0BcM+L0eQ3e7NKfiUBwujSVnXghmIW+YadPIlzHjU8TH9GJOY4PrtllmnWDoKmRB00UzFk8VtUIF8rGiWYwZphHL9QHXD0YsWWRkTAMKKTOmmdidb+dYXAyD7sm3B7NJuVIRLlWrG5UKPo1qu6pWb+Cb9oMN+HEg64/EQ01XyMQWvLwBezbgtD8beLN1pXWFftJ8EYfR11xq6/s4v1JpnVc1Te2NU100wMhXqt2y2ny32k70jxr+TKD1nVA8HqI/Q3o4uxrINt+/8SkjA++rrtZPqxX8udSGquHUiqYSgjrIdHLzgTqZJ2UyQqrkBPka+ZPa1f1JGnYd2Zng3GE6HovQsNsSnguC2++1cxbZbVn0eRRONjSJE3hZqOtOkeMdNo4DwkM9AC5X33wU+vqUCdVKOUJC8yQUsoeOfPXC2vmvPLa8dO7sqYeOTR0aq1b2jY7s3TNcLhULuwf70z2eI8N9XY53kzMuhLM9bqa31XBPzRULKaQjSobuKedzJdg2vtzt83b7yp/JQmkEiqzIecI4o9OSjHzOM765+db162/1Svju669/eP06/HBz88PXX7+liAnJCp3yu+1XH25uuqyyKSmApWz9l4HQnU/CmUx4ooBKWviwlDCTJRgPZ05sbm4mrl+/nths3tpssCJxHYY229Q22exWCvs2N1e3vRpoFhkp+k44U0oWCslSp8wgbyny9h+5/6B/T3TST3K1wfYBuonEURjXAQ4RIJQDuoS8J9wc4Tg0vtieKo6UC7zgY3qhAh7GLuhqRs7jLUsWEJJFpgpx0dCY+KPYc1Mozc33UO6wprlY3vryB633W+9BDgY0tfme6nKpNKdqNNBSeoOwzsRO/3frKrz86BsKE/POOCLjul95oJ94srYaBl6IgIX3g2wJgigbIInCeB8IAbB4QOQOe0Eaw4kU7VbdCgLhLQJfJxYiixa5TkQbjpfO4OnAKQKgkCOKIss9K6LaZZtsYwLmVAR/VouhIcAsYKFhs4htB6S9bqmTudt3fCzDJZpvvsvyxrV6/Vo3c3rlzcqbHRVtVG/Uo8/CG/XoBvwYC9zV/XuMIpeKpIJ+cA6Ejgc8Q2xUoLaVILgsrgtsWzbclk+hgh14q8AvecFKHKLVsUREImmihIrmJJrq1Jb8oBK3rLqXQjqVDQ+1uGTL0rZ9B2tnO8SFtS+B+kLtwLGpWrVcymbiMUN3Omemp+aOzR0+VJ2sTY7sLVXKldxQppgtppKx/nh/MKBHjajT7dzSbmcYlXuLAe1sMA4YHIojCiMaZxTOdFzUPblSIdV9i8qpi/e+vHdoj2t76MXmi738UVssc23ZRFkMoTh2BDVdLqfxRdDlst83pM3iRpX9qvBGINPuy2UCGy7sDLla32wPL84WN3C0oRutF7vzsXi2MwbPzOjKgr5N0juW9yAZR2k4QR4ip8lZskgukW+Q58hl8m1u/+RrFpSPPyOj0og0unIYhsuiOLyyDwgpFUmpjoJUyBQL9fzuwZ18tj8RDfkEymXp4o5DyYOx/eGq38Klx8wDkVqw4rXwAsfXU/G+gEcQDLfmsAs2RbDVc0O7BviM7nKqvGLNKHViJRbZaqmjhkqjslTHNe7dM7K3TvaQ8vCeMmoXgDhLRBEWCIhwDNGSFRf5l79skQO4SJLJ0szsr7tUbqC70oFfaaU2XOmfb19peVhc+w07z9pfdBY4svYbusIFxHp/9cwzc3PT01NTExNjY7Xa6OjwMCXffuFbz1/+5h/8/jPPPfPcsxvfePqpHg68sP7k2hOr53+7gwYZFnz47JmF+bnTc6dPnZx+aPqh2ZmpE1Mnjh+bmJyYPHpkbHwMkWHtYA2x4Wh1FMHC8MgwwgWGFvK53UODu3YO3IsWtyEHp1UiDuoYF/QsbPdfWiElIGw0MEOMWZ32L4+w776cNMx9NG94H1j1oCGCROP+3KYKXUeSxsy9eudqyDRD3CritjtP5TBxq3eu9nLu3OzpmfpkfaY+0FyfnH1lZub7k5N/MzPzh2xgrj4zz7omz3XnNF0dW7bRUuAXnB4PM5BphugnIfN5l93dvEIH7G7Fbd9KEbfbjlbtvjKKhV1UesmvuJtXGYCtVAlxbvktBds68ZEQ+q0E2UEGyBApkGEy2rFbUOx4sMeCYOMUzrZCFJ5Xlv1eaggewVgJ+KhHFD3LcV1z8HZJlewrbhaJyLK6bAG+L0QhzMNiImJyYSIYYaHOfJBdlBZjgABBJueswHH0VBQoVTj0Zk90P6Ss4Zc4hV/tfcqz1v6W4BFXP/uYutb5mqTKq7/C5xZqJ5ls79xpoPHeLpPVyhZ4RXHcObQTJfJBAmn4DJTJtkgi6sDDVNyFpODBkGB3TyTzWtvldd2eG8WKiaiGudzLKFPJbX9DOi90BRX5fjEUb9w5/ZmPa9y4cefnLFboRSOtK702fFC9dOd/kMHcbEcgaR6GKzfevIFz6MUb1Urz3Uo3NdolXDjUYKTwkHq+q4djWOTwkw7v9xOE/jxZUQCsPFhXiayCTZRt7bPlEE70cJqd4TTCcJrVYrHOEqvVskAsVgtavAMdGrD2qxNZqKWiURm5GDWjyIK+oMeNZ64wqGe1IHrkkQKnOQQjW8aDTqJehiG2D/Dg3dr/xbmcFtNuwC9aymen+mY89JkOV+5c/R47Ihb+4Zkx1euqIWdF9fyEoWty9z+52/SD7q3H2do8w+AIxKHOq5TYwWoj1rrioDbE2aJNWJJBlCRxFitROkUQvB6NRoEwcepsJ9CzbQ6rzDaD4XoEIs62hWOWiNm0zg5GwGgHssWuxQMUsX7Q0Ao11+uN+rVgwgxdwwZ9KRQ37zx9jf6suU5fovMslEz5WldCJgsbzRBc8qVak3CpdQUuIXzBQyd3f8Qdo3eRIzrxozV4oebtAyqEPaqE6/FzGO/hHjEQHJ98zYWCkSYCFdZx43Sdnf064kYgy+hLeB5msQL+NOP6ZLCWun8kWb9/4EINgVQs6vM6HRYZlyHqErLTW05jvIZxuxmXQDT0fK4MpbQXzCLoiOPLpVwEPO/kLucnYFER+NY/8XaBh0Gu73Zr6DZ3TD93+5w+4rmsS/nL+dFxKip86595LGEXf/F2a/Bj+NOwce7jhw3jsoedA9fWhVdRF3g0GA5yqHbACvwhWaS8wK8TgQjrEnprZBBXR34DnSWUMsBM4ajFAsTisDC5tDE24iDclwW5mGQIWELth7LX1EwNPmhluVerGxvNC43GtRvf+/TTjQq80Wi0fgp7COks5Dad/5w7tsGtqH47tvy72t/2220WSeAk2KFYZZGn6CeB1HG+qjnUOtGI060560jNZbhddcSsOkbMdaTt8Xs9deS6L+j31bPppBmLhKVgIBCc3fojGDiVSSXi0b6QFAgGjqJjn0O3Po1OfQpd+kTvqmd75P8FfHkvUBjAQMG97V7n3iz8kvx5c9zd24POHc49D7Oi3KtYn7qn/nnPnm5/qp0BNFDZnjaqG9vy9gSXKi2lytgIrKB/Ta+jj+2rBX2aleMpgXFmLcg6Bu70Md2ne1mkXixUIZ0qMIFGqfagdKNzEeODGOzGU4GbNwOFw4FbN/0TOf/Nm/7chP/mLf9E/kwiwOqc/9Yt9u7WzUCnP4+fle6TIx+JkQG6+yeZdIKzyDDewfbHJeAQJHLWNQ2sCrEu20GRibLsANViE9QVFmLaULOpYKHCKtsSh2LlRJ9qUVnEKPC8MEsEgemxgArfweFjW1TtisZZZaTrUNEiIq2VB9KyPZiW9qWskFmw6QdTlVfbZC2qbe3/T9eNdGfuoaus/tqEa7NfiKbFRle/MNEFlmpmwI/ql+3fkUqa8b6wPxZgob5P8/VU0yWEsm6Gc/OaiXU/YC304vA0i9XjKLTevFHOS14zbZgVBmXZvWYH0lYqzX+Np9MH0+nY0J49S3v3vh15bMfFp/rXIqhObRd0FPVlMXcqh4+/9kQNH35p6fzTTz7Z0R/0S29xNvIsOV6bXJgrcKLgRWsrs3uvcRntq0QFkRfY9QZQEZasQFHj5rCiZJ5jajb19FMX1ldXlhbnT544fnTs6559SzbUNyGeiotmPFUuVGi5tA8KaYYTHKCj38t5vLoodQcU2wOKaa1cShUGYRekd4GI00rlHB5CPoemTIyLkmh4GcDokNpFi/f3u7dIcz/wP5J7xG93gisQtbhAMlrf8UhgWOJ9OiiOwOO76z676vL0YR86GcpTWZDjPg8oauDxoSWPqroCIasOkgNeUCVwW3eFVNX36OCST1V1X1zSwW2JhlygnOB5n93lpKJoO/hvisBx/35CEXmnS/UB69GcPC/ZD0bgHxx2FQlanVTgabc7wLoF5fgtim7z+nFFpIpnW4f9WPO/DiAxDDR9HT7Rt5FPWbKrlg3LFHk0joePDFhhuOFJBjH4OcLz7IKSJ1P78u5hUxD8WcDjQefODkjTxSywe1tzq5VK44+dZYldXdK3dTVEVR489lFVn3Y5sZwtH04mlg9WfgA2Vacf9zsTwKliX3ND1XWVvtKcZzUYUiB2cP/0w99Cl9e9Vz3PrWIMxPzqeG2MR3FxOO2cIBKhripUREslyQhN2eKVCSvIsl0+QghzYDhny4dpWwldGBTNsim1s5Fv53y5nfE9vs5zq9ciG5EG5o/eifxwW/taI9KAjzYamDYa3arRYOb77t3u/9sYKh8hz9ccJvBCFkWdWAAkDm24gjZnAFWaE/gVBmBEjrQv+xB0otIL8jyRZWUC4Rl6AkrtFAOtnZ3h3NoXGr9QU4qxlO4ulrymBbcpbIPUXgSi7u59e1pDQ4BcQiPAbuRxhNSFrKhl2Mc4yG0qYnNTtlpluihZJwrJ5mayAKUEXUwWPpywys3OvfiZM4kSFJL4trSPLrLhnQ66wsZ3OqDwozNn2qMZwYkOjQL5XxyYz4kAAHicY2BkYGAAYoWQLZPj+W2+MnAzvwCKMNzOCL8Go////5/F/II5CMjlYGACiQIAb6wN5AB4nGNgZGBgDvqfBSRf/AcC5hcMQBEUIAwAtq0HpgAAAHicY37BwMAMwgugNC4ciWAzrUNinwLS2SD2//8Ae2MRwgAAAAAAAAABygK4AxQDhgSMBuIH6giCCOwJcAmyCpgK1gw4DQwNZA24DlIAAQAAABMAiAAWAAAAAAACAI4AngBzAAABWwtwAAAAAHicjZLPSutAFId/qVXRgqAXXB/uQhQxjRE3rgoFXbkR7FJI08mfkmbKZCrU/V35IL6BOx/Al9BX8dfpcFGKaMIk3/nOmcnMIQD28IYAy+ucY8kBdhktuYVNXHpeo7/23CbfeV5HB9rzBv2D520c49FzB3/wzBWC9hajMV49B/gbnHluYSe49bxGn3puk/95Xsd+8OR5g/7F8zYGwbvnDg5a5309nZsyL6wc9o8kjuJIhnPRVGWdVJLMbKFNIz3JdG1VVekw1ZNMm8lwVlYjZU7KVNfNjcpnVWJW/IoYKNOUupbTMFrJXalamcSq0WIHzX0eW5tJZvRELv23ZWr0WKU2LKydXnS7n/eEPps7xRwGJXIUsBAc0h7xHSNyQzBkhbByWVWiRoKKJsGMMwqXaRj3ODJGNa1iRUUOkfI5cd7wPeSckpkRKwxOyKmb0eCGJme24rrmF/U/VwycaWgWseCUu4l+Me+KpnY2cScZ/e9Bg3vuMaa1XGdxWuNOJ/yRv55b2NdFbkyT0oeuu5b2Al3e3/TpA2udouQAAAB4nG3IWw7CIBBGYX5FbK133YaLmg6jECkQpInu3mjjm+fpy1EzNbVS/zthhjk0FjBYokGLFTqsscEWO+xxwBEnnNWaxpo4DTlIFW2pSsNO+N6n5/aHy62kMXeFrE+T2+LZXao8q3lIEK7Nx1SE9HdmieyDvvogxnlrJRqmyBJMP9aaonFCVkqbqdCtUHYmjkMvRXPKL6Xep1o2rQB4nGPw3sFwIihiIyNjX+QGxp0cDBwMyQUbGVidNjEwMmiBGJu5mBg5ICw+BjCLzWkX0wGgNCeQze60i8EBwmZmcNmowtgRGLHBoSNiI3OKy0Y1EG8XRwMDI4tDR3JIBEhJJBBs5mFi5NHawfi/dQNL70YmBhcADHYj9AAA") format("woff")}[class^=formbuilder-icon-]:before,[class*=" formbuilder-icon-"]:before{font-family:"formbuilder-icons";font-style:normal;font-weight:normal;speak:never;display:inline-block;text-decoration:inherit;width:1em;margin-right:.2em;text-align:center;font-variant:normal;text-transform:none;line-height:1em;margin-left:.2em}.formbuilder-icon-autocomplete:before{content:"\uE800"}.formbuilder-icon-date:before{content:"\uE801"}.formbuilder-icon-checkbox:before{content:"\uE802"}.formbuilder-icon-checkbox-group:before{content:"\uE803"}.formbuilder-icon-radio-group:before{content:"\uE804"}.formbuilder-icon-rich-text:before{content:"\uE805"}.formbuilder-icon-select:before{content:"\uE806"}.formbuilder-icon-textarea:before{content:"\uE807"}.formbuilder-icon-text:before{content:"\uE808"}.formbuilder-icon-pencil:before{content:"\uE809"}.formbuilder-icon-file:before{content:"\uE80A"}.formbuilder-icon-hidden:before{content:"\uE80B"}.formbuilder-icon-cancel:before{content:"\uE80C"}.formbuilder-icon-button:before{content:"\uE80D"}.formbuilder-icon-header:before{content:"\uE80F"}.formbuilder-icon-paragraph:before{content:"\uE810"}.formbuilder-icon-number:before{content:"\uE811"}.formbuilder-icon-copy:before{content:"\uF24D"}.formbuilder-icon-grid:before{content:url("data:image/svg+xml; utf8, <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-list-nested' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z'/></svg>")}.formbuilder-icon-plus:before{content:url("data:image/svg+xml; utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/></svg>")}.form-wrap.form-builder{position:relative}.form-wrap.form-builder *{box-sizing:border-box}.form-wrap.form-builder button,.form-wrap.form-builder input,.form-wrap.form-builder select,.form-wrap.form-builder textarea{font-family:inherit;font-size:inherit;line-height:inherit}.form-wrap.form-builder input{line-height:normal}.form-wrap.form-builder textarea{overflow:auto}.form-wrap.form-builder button,.form-wrap.form-builder input,.form-wrap.form-builder select,.form-wrap.form-builder textarea{font-family:inherit;font-size:inherit;line-height:inherit}.form-wrap.form-builder .btn-group{position:relative;display:inline-block;vertical-align:middle}.form-wrap.form-builder .btn-group>.btn{position:relative;float:left}.form-wrap.form-builder .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0}.form-wrap.form-builder .btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle){border-radius:0}.form-wrap.form-builder .btn-group .btn+.btn,.form-wrap.form-builder .btn-group .btn+.btn-group,.form-wrap.form-builder .btn-group .btn-group+.btn,.form-wrap.form-builder .btn-group .btn-group+.btn-group{margin-left:-1px}.form-wrap.form-builder .btn-group>.btn:last-child:not(:first-child),.form-wrap.form-builder .btn-group>.dropdown-toggle:not(:first-child),.form-wrap.form-builder .btn-group .input-group .form-control:last-child,.form-wrap.form-builder .btn-group .input-group-addon:last-child,.form-wrap.form-builder .btn-group .input-group-btn:first-child>.btn-group:not(:first-child)>.btn,.form-wrap.form-builder .btn-group .input-group-btn:first-child>.btn:not(:first-child),.form-wrap.form-builder .btn-group .input-group-btn:last-child>.btn,.form-wrap.form-builder .btn-group .input-group-btn:last-child>.btn-group>.btn,.form-wrap.form-builder .btn-group .input-group-btn:last-child>.dropdown-toggle{border-top-left-radius:0;border-bottom-left-radius:0}.form-wrap.form-builder .btn-group>.btn.active,.form-wrap.form-builder .btn-group>.btn:active,.form-wrap.form-builder .btn-group>.btn:focus,.form-wrap.form-builder .btn-group>.btn:hover{z-index:2}.form-wrap.form-builder .btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;user-select:none;background-image:none;border-radius:4px}.form-wrap.form-builder .btn.btn-lg{padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}.form-wrap.form-builder .btn.btn-sm{padding:5px 10px;font-size:12px;line-height:1.5;border-radius:3px}.form-wrap.form-builder .btn.btn-xs{padding:1px 5px;font-size:12px;line-height:1.5;border-radius:3px}.form-wrap.form-builder .btn.active,.form-wrap.form-builder .btn.btn-active,.form-wrap.form-builder .btn:active{background-image:none}.form-wrap.form-builder .input-group .form-control:last-child,.form-wrap.form-builder .input-group-addon:last-child,.form-wrap.form-builder .input-group-btn:first-child>.btn-group:not(:first-child)>.btn,.form-wrap.form-builder .input-group-btn:first-child>.btn:not(:first-child),.form-wrap.form-builder .input-group-btn:last-child>.btn,.form-wrap.form-builder .input-group-btn:last-child>.btn-group>.btn,.form-wrap.form-builder .input-group-btn:last-child>.dropdown-toggle{border-top-left-radius:0;border-bottom-left-radius:0}.form-wrap.form-builder .input-group .form-control,.form-wrap.form-builder .input-group-addon,.form-wrap.form-builder .input-group-btn{display:table-cell}.form-wrap.form-builder .input-group-lg>.form-control,.form-wrap.form-builder .input-group-lg>.input-group-addon,.form-wrap.form-builder .input-group-lg>.input-group-btn>.btn{height:46px;padding:10px 16px;font-size:18px;line-height:1.3333333}.form-wrap.form-builder .input-group{position:relative;display:table;border-collapse:separate}.form-wrap.form-builder .input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0}.form-wrap.form-builder .form-control,.form-wrap.form-builder output{font-size:14px;line-height:1.42857143;display:block}.form-wrap.form-builder textarea.form-control{height:auto}.form-wrap.form-builder .form-control{height:34px;display:block;width:100%;padding:6px 12px;font-size:14px;line-height:1.42857143;border-radius:4px}.form-wrap.form-builder .form-control:focus{outline:0;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}.form-wrap.form-builder .form-group{margin-left:0px;margin-bottom:15px}.form-wrap.form-builder .btn,.form-wrap.form-builder .form-control{background-image:none}.form-wrap.form-builder .pull-right{float:right}.form-wrap.form-builder .pull-left{float:left}.form-wrap.form-builder .formbuilder-required,.form-wrap.form-builder .required-asterisk{color:#c10000}.form-wrap.form-builder .formbuilder-checkbox-group input[type=checkbox],.form-wrap.form-builder .formbuilder-checkbox-group input[type=radio],.form-wrap.form-builder .formbuilder-radio-group input[type=checkbox],.form-wrap.form-builder .formbuilder-radio-group input[type=radio]{margin:0 4px 0 0}.form-wrap.form-builder .formbuilder-checkbox-inline,.form-wrap.form-builder .formbuilder-radio-inline{margin-right:8px;display:inline-block;vertical-align:middle;padding-left:0}.form-wrap.form-builder .formbuilder-checkbox-inline label input[type=text],.form-wrap.form-builder .formbuilder-radio-inline label input[type=text]{margin-top:0}.form-wrap.form-builder .formbuilder-checkbox-inline:first-child,.form-wrap.form-builder .formbuilder-radio-inline:first-child{padding-left:0}.form-wrap.form-builder .formbuilder-autocomplete-list{background-color:#fff;display:none;list-style:none;padding:0;border:1px solid #ccc;border-width:0 1px 1px;position:absolute;z-index:20;max-height:200px;overflow-y:auto}.form-wrap.form-builder .formbuilder-autocomplete-list li{display:none;cursor:default;padding:5px;margin:0;transition:background-color 200ms ease-in-out}.form-wrap.form-builder .formbuilder-autocomplete-list li:hover,.form-wrap.form-builder .formbuilder-autocomplete-list li.active-option{background-color:rgba(0,0,0,.075)}@keyframes PLACEHOLDER{0%{height:1px}100%{height:15px}}.form-wrap.form-builder .cb-wrap{width:26%;transition:transform 250ms}.form-wrap.form-builder .cb-wrap.pull-left .form-actions{float:left}.form-wrap.form-builder .cb-wrap h4{margin-top:0;color:#666}@media(max-width: 481px){.form-wrap.form-builder .cb-wrap{width:64px}.form-wrap.form-builder .cb-wrap h4{display:none}}.form-wrap.form-builder .frmb-control{margin:0;padding:0;border-radius:5px}.form-wrap.form-builder .frmb-control li{cursor:move;list-style:none;margin:0 0 -1px 0;padding:10px;text-align:left;background:#fff;-webkit-user-select:none;user-select:none;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;box-shadow:inset 0 0 0 1px #c5c5c5}.form-wrap.form-builder .frmb-control li .control-icon{width:16px;height:auto;margin-right:10px;margin-left:.2em;display:inline-block}.form-wrap.form-builder .frmb-control li .control-icon img,.form-wrap.form-builder .frmb-control li .control-icon svg{max-width:100%;height:auto}.form-wrap.form-builder .frmb-control li:first-child{border-radius:5px 5px 0 0;margin-top:0}.form-wrap.form-builder .frmb-control li:last-child{border-radius:0 0 5px 5px}.form-wrap.form-builder .frmb-control li::before{margin-right:10px;font-size:16px}.form-wrap.form-builder .frmb-control li:hover{background-color:#f2f2f2}.form-wrap.form-builder .frmb-control li.ui-sortable-helper{border-radius:5px;transition:box-shadow 250ms;box-shadow:2px 2px 6px 0 #666;border:1px solid #fff}.form-wrap.form-builder .frmb-control li.ui-state-highlight{width:0;overflow:hidden;padding:0;margin:0;border:0 none}.form-wrap.form-builder .frmb-control li.moving{opacity:.6}.form-wrap.form-builder .frmb-control li.formbuilder-separator{background-color:transparent;box-shadow:none;padding:0;cursor:default}.form-wrap.form-builder .frmb-control li.formbuilder-separator hr{margin:10px 0}@media(max-width: 481px){.form-wrap.form-builder .frmb-control li::before{font-size:30px}.form-wrap.form-builder .frmb-control li span{display:none}}.form-wrap.form-builder .frmb-control.sort-enabled li.ui-state-highlight{box-shadow:none;height:0;width:100%;background:radial-gradient(ellipse at center, #545454 0%, rgba(0, 0, 0, 0) 75%);border:0 none;-webkit-clip-path:polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);clip-path:polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);visibility:visible;overflow:hidden;margin:1px 0 3px;animation:PLACEHOLDER 250ms forwards}.form-wrap.form-builder .formbuilder-mobile .form-actions{width:100%}.form-wrap.form-builder .formbuilder-mobile .form-actions button{width:100%;font-size:.85em !important;display:block !important;border-radius:0 !important;margin-top:-1px;margin-left:0 !important}.form-wrap.form-builder .formbuilder-mobile .form-actions button:first-child{border-radius:5px 5px 0 0 !important;margin-top:0 !important;border-bottom:0 none}.form-wrap.form-builder .formbuilder-mobile .form-actions button:last-child{border-radius:0 0 5px 5px !important}.form-wrap.form-builder .form-actions{float:right;margin-top:5px}.form-wrap.form-builder .form-actions button{border:0 none}.form-wrap.form-builder .stage-wrap{position:relative;padding:0;margin:0;width:calc(74% - 5px)}@media(max-width: 481px){.form-wrap.form-builder .stage-wrap{width:calc(100% - 64px)}}.form-wrap.form-builder .stage-wrap.empty{border:3px dashed #ccc;background-color:rgba(255,255,255,.25)}.form-wrap.form-builder .stage-wrap.empty::after{content:attr(data-content);position:absolute;text-align:center;top:50%;left:0;width:100%;margin-top:-1em}.form-wrap.form-builder .frmb{list-style-type:none;min-height:200px;transition:background-color 500ms ease-in-out}.form-wrap.form-builder .frmb .formbuilder-required{color:#c10000}.form-wrap.form-builder .frmb.removing{overflow:hidden}.form-wrap.form-builder .frmb li.form-field:hover{border-color:#66afe9;outline:0;box-shadow:inset 0 1px 1px rgba(0,0,0,.1),0 0 8px rgba(102,175,233,.6)}.form-wrap.form-builder .frmb li.form-field:hover .field-actions{opacity:1}.form-wrap.form-builder .frmb li.form-field:hover li :hover{background:#fefefe}.form-wrap.form-builder .frmb li.form-field{position:relative;padding:6px;clear:both;margin-left:0;margin-bottom:3px;background-color:#fff;transition:background-color 250ms ease-in-out,margin-top 400ms}.form-wrap.form-builder .frmb li.form-field.hidden-field{background-color:rgba(255,255,255,.6)}.form-wrap.form-builder .frmb li.form-field:first-child{border-top-right-radius:5px;border-top-left-radius:5px}.form-wrap.form-builder .frmb li.form-field:first-child .field-actions .btn:last-child{border-radius:0 5px 0 0}.form-wrap.form-builder .frmb li.form-field:last-child{border-bottom-right-radius:5px;border-bottom-left-radius:5px}.form-wrap.form-builder .frmb li.form-field.no-fields label{font-weight:400}@keyframes PLACEHOLDER{0%{height:0}100%{height:15px}}.form-wrap.form-builder .frmb li.form-field.frmb-placeholder,.form-wrap.form-builder .frmb li.form-field.ui-state-highlight{height:0;padding:0;background:radial-gradient(ellipse at center, #545454 0%, rgba(0, 0, 0, 0) 75%);border:0 none;-webkit-clip-path:polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);clip-path:polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);visibility:visible;overflow:hidden;margin-bottom:3px;animation:PLACEHOLDER 250ms forwards}.form-wrap.form-builder .frmb li.form-field.moving,.form-wrap.form-builder .frmb li.form-field.ui-sortable-helper{transition:box-shadow 500ms ease-in-out;box-shadow:2px 2px 6px 0 #666;border:1px solid #fff;border-radius:5px}.form-wrap.form-builder .frmb li.form-field.disabled-field{z-index:1;position:relative;overflow:visible}.form-wrap.form-builder .frmb li.form-field.disabled-field:hover .frmb-tt{display:inline-block}.form-wrap.form-builder .frmb li.form-field.disabled-field [type=checkbox]{float:left;margin-right:10px}.form-wrap.form-builder .frmb li.form-field.disabled-field h2{border-bottom:0 none}.form-wrap.form-builder .frmb li.form-field.disabled-field label{font-size:12px;font-weight:400;color:#666}.form-wrap.form-builder .frmb li.form-field.disabled-field .prev-holder{cursor:default;line-height:28px;padding-left:5px}.form-wrap.form-builder .frmb li.form-field .close-field{position:absolute;color:#666;left:50%;bottom:6px;background:#fff;border-top:1px solid #c5c5c5;border-left:1px solid #c5c5c5;border-right:1px solid #c5c5c5;transform:translateX(-50%);padding:0 5px;border-top-right-radius:3px;border-top-left-radius:3px;cursor:pointer;transition:background-color 250ms ease-in-out}.form-wrap.form-builder .frmb li.form-field .close-field:hover{text-decoration:none}.form-wrap.form-builder .frmb li.form-field.button-field h1,.form-wrap.form-builder .frmb li.form-field.button-field h2,.form-wrap.form-builder .frmb li.form-field.button-field h3,.form-wrap.form-builder .frmb li.form-field.button-field p,.form-wrap.form-builder .frmb li.form-field.button-field canvas,.form-wrap.form-builder .frmb li.form-field.button-field output,.form-wrap.form-builder .frmb li.form-field.button-field address,.form-wrap.form-builder .frmb li.form-field.button-field blockquote,.form-wrap.form-builder .frmb li.form-field.button-field .prev-holder,.form-wrap.form-builder .frmb li.form-field.header-field h1,.form-wrap.form-builder .frmb li.form-field.header-field h2,.form-wrap.form-builder .frmb li.form-field.header-field h3,.form-wrap.form-builder .frmb li.form-field.header-field p,.form-wrap.form-builder .frmb li.form-field.header-field canvas,.form-wrap.form-builder .frmb li.form-field.header-field output,.form-wrap.form-builder .frmb li.form-field.header-field address,.form-wrap.form-builder .frmb li.form-field.header-field blockquote,.form-wrap.form-builder .frmb li.form-field.header-field .prev-holder,.form-wrap.form-builder .frmb li.form-field.paragraph-field h1,.form-wrap.form-builder .frmb li.form-field.paragraph-field h2,.form-wrap.form-builder .frmb li.form-field.paragraph-field h3,.form-wrap.form-builder .frmb li.form-field.paragraph-field p,.form-wrap.form-builder .frmb li.form-field.paragraph-field canvas,.form-wrap.form-builder .frmb li.form-field.paragraph-field output,.form-wrap.form-builder .frmb li.form-field.paragraph-field address,.form-wrap.form-builder .frmb li.form-field.paragraph-field blockquote,.form-wrap.form-builder .frmb li.form-field.paragraph-field .prev-holder{margin:0}.form-wrap.form-builder .frmb li.form-field.button-field .field-label,.form-wrap.form-builder .frmb li.form-field.header-field .field-label,.form-wrap.form-builder .frmb li.form-field.paragraph-field .field-label{display:none}.form-wrap.form-builder .frmb li.form-field.button-field.editing .field-label,.form-wrap.form-builder .frmb li.form-field.header-field.editing .field-label,.form-wrap.form-builder .frmb li.form-field.paragraph-field.editing .field-label{display:block}.form-wrap.form-builder .frmb li.form-field.paragraph-field .fld-label{min-height:150px;overflow-y:auto}.form-wrap.form-builder .frmb li.form-field.checkbox-field .field-label{display:none}.form-wrap.form-builder .frmb li.deleting,.form-wrap.form-builder .frmb li.delete:hover,.form-wrap.form-builder .frmb li:hover li.delete:hover{background-color:#fdd}.form-wrap.form-builder .frmb li.deleting .close-field,.form-wrap.form-builder .frmb li.delete:hover .close-field,.form-wrap.form-builder .frmb li:hover li.delete:hover .close-field{background-color:#fdd}.form-wrap.form-builder .frmb li.deleting{z-index:20;pointer-events:none}.form-wrap.form-builder .frmb.disabled-field{padding:0 5px}.form-wrap.form-builder .frmb.disabled-field :hover{border-color:transparent}.form-wrap.form-builder .frmb.disabled-field .form-element{float:none;margin-bottom:10px;overflow:visible;padding:5px 0;position:relative}.form-wrap.form-builder .frmb .frm-holder{display:none}.form-wrap.form-builder .frmb .tooltip{left:20px}.form-wrap.form-builder .frmb .prev-holder{display:block}.form-wrap.form-builder .frmb .prev-holder .form-group{margin:0}.form-wrap.form-builder .frmb .prev-holder .ql-editor{min-height:125px}.form-wrap.form-builder .frmb .prev-holder .form-group>label:not([class=formbuilder-checkbox-label]){display:none}.form-wrap.form-builder .frmb .prev-holder select,.form-wrap.form-builder .frmb .prev-holder input[type=text],.form-wrap.form-builder .frmb .prev-holder textarea,.form-wrap.form-builder .frmb .prev-holder input[type=number]{background-color:#fff;border:1px solid #ccc;box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.form-wrap.form-builder .frmb .prev-holder input[type=color]{width:60px;padding:2px;display:inline-block}.form-wrap.form-builder .frmb .prev-holder input[type=date]{width:auto}.form-wrap.form-builder .frmb .prev-holder select[multiple]{height:auto}.form-wrap.form-builder .frmb .prev-holder label{font-weight:normal}.form-wrap.form-builder .frmb .prev-holder input[type=number]{width:auto}.form-wrap.form-builder .frmb .prev-holder input[type=color]{width:60px;padding:2px;display:inline-block}.form-wrap.form-builder .frmb .required-asterisk{display:none}.form-wrap.form-builder .frmb .field-label,.form-wrap.form-builder .frmb .legend{color:#666;margin-bottom:5px;line-height:27px;font-size:16px;font-weight:normal}.form-wrap.form-builder .frmb .disabled-field .field-label{display:block}.form-wrap.form-builder .frmb .other-option:checked+label input{display:inline-block}.form-wrap.form-builder .frmb .other-val{margin-left:5px;display:none}.form-wrap.form-builder .frmb .field-actions{position:absolute;top:0;right:0;opacity:0}.form-wrap.form-builder .frmb .field-actions a::before{margin:0}.form-wrap.form-builder .frmb .field-actions a:hover{text-decoration:none;color:#000}.form-wrap.form-builder .frmb .field-actions .btn{display:inline-block;width:32px;height:32px;padding:0 6px;border-radius:0;border-color:#c5c5c5;background-color:#fff;color:#c5c5c5;line-height:32px;font-size:16px;border-width:0 0 1px 1px}.form-wrap.form-builder .frmb .field-actions .btn:first-child{border-bottom-left-radius:5px}.form-wrap.form-builder .frmb .field-actions .toggle-form:hover{background-color:#65aac6;color:#fff}.form-wrap.form-builder .frmb .field-actions .copy-button:hover{background-color:#6fc665;color:#fff}.form-wrap.form-builder .frmb .field-actions .del-button:hover{background-color:#c66865;color:#fff}.form-wrap.form-builder .frmb .option-actions{text-align:right;margin-top:10px;width:100%;margin-left:2%}.form-wrap.form-builder .frmb .option-actions button,.form-wrap.form-builder .frmb .option-actions a{background:#fff;padding:5px 10px;border:1px solid #c5c5c5;font-size:14px;border-radius:5px;cursor:default}.form-wrap.form-builder .frmb .sortable-options-wrap{width:81.33333333%;display:inline-block}.form-wrap.form-builder .frmb .sortable-options-wrap label{font-weight:normal}@media(max-width: 481px){.form-wrap.form-builder .frmb .sortable-options-wrap{display:block;width:100%}}.form-wrap.form-builder .frmb .radio-group-field .sortable-options li:nth-child(2) .remove{display:none}.form-wrap.form-builder .frmb .sortable-options{display:inline-block;width:100%;margin-left:2%;background:#c5c5c5;margin-bottom:0;border-radius:2px;list-style:none;padding:0}.form-wrap.form-builder .frmb .sortable-options>li{cursor:move;margin:1px;padding:6px;background-color:#fff}.form-wrap.form-builder .frmb .sortable-options>li:nth-child(1) .remove{display:none}.form-wrap.form-builder .frmb .sortable-options>li .remove{position:relative;opacity:1;float:right;right:14px;height:18px;width:18px;top:8px;font-size:12px;padding:0;color:#c10000}.form-wrap.form-builder .frmb .sortable-options>li .remove::before{margin:0}.form-wrap.form-builder .frmb .sortable-options>li .remove:hover{background-color:#c10000 !important;text-decoration:none;color:#fff}.form-wrap.form-builder .frmb .sortable-options .option-selected{margin:0;width:5%}.form-wrap.form-builder .frmb .sortable-options input[type=text]{width:calc(44.5% - 17px);margin:0 3px;float:none}.form-wrap.form-builder .frmb .form-field .form-group{width:100%;clear:left;float:none}.form-wrap.form-builder .frmb .col-md-6 .form-elements,.form-wrap.form-builder .frmb .col-md-8 .form-elements{width:100%}.form-wrap.form-builder .frmb .field-options .add-area .add{clear:both}.form-wrap.form-builder .frmb .style-wrap button.selected{border:1px solid #000;margin-top:0;margin-right:1px;box-shadow:0 0 0 1px #fff inset;padding:1px 5px}.form-wrap.form-builder .frmb .form-elements{padding:10px 5px;background:#f7f7f7;border-radius:3px;margin:0;border:1px solid #c5c5c5}.form-wrap.form-builder .frmb .form-elements .input-wrap{width:81.33333333%;margin-left:2%;float:left}.form-wrap.form-builder .frmb .form-elements .input-wrap>input[type=checkbox]{margin-top:8px}.form-wrap.form-builder .frmb .form-elements .btn-group{margin-left:2%}.form-wrap.form-builder .frmb .form-elements .add{clear:both}.form-wrap.form-builder .frmb .form-elements [contenteditable],.form-wrap.form-builder .frmb .form-elements select[multiple]{height:auto}.form-wrap.form-builder .frmb .form-elements [contenteditable].form-control,.form-wrap.form-builder .frmb .form-elements input[type=text],.form-wrap.form-builder .frmb .form-elements input[type=number],.form-wrap.form-builder .frmb .form-elements input[type=date],.form-wrap.form-builder .frmb .form-elements input[type=color],.form-wrap.form-builder .frmb .form-elements textarea,.form-wrap.form-builder .frmb .form-elements select{transition:background 250ms ease-in-out;padding:6px 12px;border:1px solid #c5c5c5;background-color:#fff}@media(max-width: 481px){.form-wrap.form-builder .frmb .form-elements .input-wrap{width:100%;margin-left:0;float:none}}.form-wrap.form-builder .frmb .form-elements input[type=number]{width:auto}.form-wrap.form-builder .frmb .form-elements .btn-group{margin-left:2%}.col-md-6 .form-wrap.form-builder .frmb .form-elements .false-label,.col-md-8 .form-wrap.form-builder .frmb .form-elements .false-label,.col-md-6 .form-wrap.form-builder .frmb .form-elements label,.col-md-8 .form-wrap.form-builder .frmb .form-elements label{display:block}.form-wrap.form-builder .frmb .form-elements .false-label:first-child,.form-wrap.form-builder .frmb .form-elements label:first-child{width:16.66666667%;padding-top:7px;margin-bottom:0;text-align:right;font-weight:700;float:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-transform:capitalize}@media(max-width: 481px){.form-wrap.form-builder .frmb .form-elements .false-label:first-child,.form-wrap.form-builder .frmb .form-elements label:first-child{display:block;width:auto;float:none;text-align:left}.form-wrap.form-builder .frmb .form-elements .false-label:first-child.empty-label,.form-wrap.form-builder .frmb .form-elements label:first-child.empty-label{display:none}}.form-wrap.form-builder .frmb .form-elements .false-label.multiple,.form-wrap.form-builder .frmb .form-elements .false-label.required-label,.form-wrap.form-builder .frmb .form-elements .false-label.toggle-label,.form-wrap.form-builder .frmb .form-elements .false-label.roles-label,.form-wrap.form-builder .frmb .form-elements .false-label.other-label,.form-wrap.form-builder .frmb .form-elements label.multiple,.form-wrap.form-builder .frmb .form-elements label.required-label,.form-wrap.form-builder .frmb .form-elements label.toggle-label,.form-wrap.form-builder .frmb .form-elements label.roles-label,.form-wrap.form-builder .frmb .form-elements label.other-label{text-align:left;float:none;margin-bottom:-3px;font-weight:400;width:calc(81.3333% - 23px)}.form-wrap.form-builder .frmb .form-elements input.error{border:1px solid #c10000}.form-wrap.form-builder .frmb .form-elements input.fld-maxlength{width:75px}.form-wrap.form-builder .frmb .form-elements input.field-error{background:#fefefe;border:1px solid #c5c5c5}.form-wrap.form-builder .frmb .form-elements label em{display:block;font-weight:400;font-size:.75em}.form-wrap.form-builder .frmb .form-elements label.maxlength-label{line-height:1em}.form-wrap.form-builder .frmb .form-elements .available-roles{display:none;padding:10px;margin:10px 0;background:#e6e6e6;box-shadow:inset 0 0 2px 0 #b3b3b3}@media(max-width: 481px){.form-wrap.form-builder .frmb .form-elements .available-roles{margin-left:0}}.form-wrap.form-builder .frmb .form-elements .available-roles label{font-weight:400;width:auto;float:none;display:inline}.form-wrap.form-builder .frmb .form-elements .available-roles input{display:inline;top:auto}.form-wrap.form-builder .autocomplete-field .sortable-options .option-selected{display:none}.form-wrap.form-builder .formbuilder-mobile .field-actions{opacity:1}.form-wrap.form-builder *[tooltip]{position:relative}.form-wrap.form-builder *[tooltip]:hover:after{background:rgba(0,0,0,.9);border-radius:5px 5px 5px 0;bottom:23px;color:#fff;content:attr(tooltip);padding:10px 5px;position:absolute;z-index:98;left:2px;width:230px;text-shadow:none;font-size:12px;line-height:1.5em;cursor:default}.form-wrap.form-builder *[tooltip]:hover:before{border:solid;border-color:#222 transparent;border-width:6px 6px 0;bottom:17px;content:"";left:2px;position:absolute;z-index:99;cursor:default}.form-wrap.form-builder .tooltip-element{visibility:visible;color:#fff;background:#000;width:16px;height:16px;border-radius:8px;display:inline-block;text-align:center;line-height:16px;margin:0 5px;font-size:12px;cursor:default}.form-wrap.form-builder .snackbar{visibility:hidden;min-width:250px;margin-left:-125px;background-color:#333;color:#fff;text-align:center;border-radius:2px;padding:16px;position:fixed;z-index:1;left:50%;bottom:30px}.form-wrap.form-builder .snackbar.show{visibility:visible;animation:fadein .5s,fadeout .5s 2.5s}@keyframes fadein{from{bottom:0;opacity:0}to{bottom:30px;opacity:1}}@keyframes fadeout{from{bottom:30px;opacity:1}to{bottom:0;opacity:0}}.form-wrap.form-builder .ui-state-highlight{border-radius:3px;border:1px dashed #0d99f2;border-radius:3px;background-color:#e5f5f8;width:12px}.form-wrap.form-builder .moveHighlight{border:1px dashed #0d99f2 !important;background-color:#e5f5f8 !important}.form-wrap.form-builder .currentGridModeFieldHighlight{background-color:#e5f5f8 !important}.form-wrap.form-builder .grid-mode-help{background-color:#fff;border-top-left-radius:5px;border-top-right-radius:5px}.form-wrap.form-builder .grid-mode-help-row1{white-space:nowrap;text-overflow:ellipsis;overflow:hidden;max-width:1px}.form-wrap.form-builder .grid-mode-help-row2{white-space:nowrap}.form-wrap.form-builder .colHoverTempStyle{padding-left:7px !important;padding-right:7px !important;flex:95 1 0% !important}.form-wrap.form-builder .rowWrapper{margin-left:0px !important;margin-right:0px !important}.form-wrap.form-builder .btnAddControl{border:0;background-color:unset}.form-wrap.form-builder .hoverColumnDropStyle{border:1px dashed #0d99f2;border-radius:3px;background-color:#e5f5f8;width:20px;position:fixed;margin-left:40px}.form-wrap.form-builder .hoverDropStyleInverse{background-color:#0d99f2;border:1px dashed #e5f5f8}.form-wrap.form-builder .invisibleRowPlaceholder{width:0px !important;position:fixed !important;left:-100px !important}.form-wrap.form-builder .kc-toggle{padding-left:0 !important}.form-wrap.form-builder .kc-toggle span{position:relative;width:48px;height:24px;background:#e6e6e6;display:inline-block;border-radius:4px;border:1px solid #ccc;padding:2px;overflow:hidden;float:left;margin-right:5px;will-change:transform}.form-wrap.form-builder .kc-toggle span::after,.form-wrap.form-builder .kc-toggle span::before{position:absolute;display:inline-block;top:0}.form-wrap.form-builder .kc-toggle span::after{position:relative;content:"";width:50%;height:100%;left:0;border-radius:3px;background:linear-gradient(to bottom, white 0%, #ccc 100%);border:1px solid #999;transition:transform 100ms;transform:translateX(0)}.form-wrap.form-builder .kc-toggle span::before{border-radius:4px;top:2px;left:2px;content:"";width:calc(100% - 4px);height:18px;box-shadow:0 0 1px 1px #b3b3b3 inset;background-color:transparent}.form-wrap.form-builder .kc-toggle input{height:0;overflow:hidden;width:0;opacity:0;pointer-events:none;margin:0}.form-wrap.form-builder .kc-toggle input:checked+span::after{transform:translateX(100%)}.form-wrap.form-builder .kc-toggle input:checked+span::before{background-color:#6fc665}.form-wrap.form-builder::after{content:"";display:table;clear:both}.cb-wrap,.stage-wrap{vertical-align:top}.cb-wrap.pull-right,.stage-wrap.pull-right{float:right}.cb-wrap.pull-left,.stage-wrap.pull-left{float:left}.form-elements,.form-group,.multi-row span,textarea{display:block}.form-elements::after,.form-group::after{content:".";display:block;height:0;clear:both;visibility:hidden}.form-elements .field-options div:hover,.frmb .legend,.frmb .prev-holder{cursor:move}.frmb-tt{display:none;position:absolute;top:0;left:0;border:1px solid #262626;background-color:#666;border-radius:5px;padding:5px;color:#fff;z-index:20;text-align:left;font-size:12px;pointer-events:none}.frmb-tt::before{border-color:#262626 transparent;bottom:-11px}.frmb-tt::before,.frmb-tt::after{content:"";position:absolute;border-style:solid;border-width:10px 10px 0;border-color:#666 transparent;display:block;width:0;z-index:1;margin-left:-10px;bottom:-10px;left:20px}.frmb-tt a{text-decoration:underline;color:#fff}.frmb li:hover .del-button,.frmb li:hover .toggle-form,.formbuilder-mobile .frmb li .del-button,.formbuilder-mobile .frmb li .toggle-form{opacity:1}.frmb-xml .ui-dialog-content{white-space:pre-wrap;word-wrap:break-word;font-size:12px;padding:0 30px;margin-top:0}.toggle-form{opacity:0}.toggle-form:hover{border-color:#ccc}.toggle-form::before{margin:0}.formb-field-vars .copy-var{display:inline-block;width:24px;height:24px;background:#b3b3b3;text-indent:-9999px}.ui-button .ui-button-text{line-height:0}.form-builder-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,.5);display:none;z-index:10}.form-builder-overlay.visible{display:block}.form-builder-dialog{position:absolute;border-radius:5px;background:#fff;z-index:20;transform:translate(-50%, -50%);top:0;left:0;padding:10px;box-shadow:0 3px 10px #000;min-width:166px;max-height:80%;overflow-y:scroll}.form-builder-dialog h3{margin-top:0}.form-builder-dialog.data-dialog{width:65%;background-color:#23241f}.form-builder-dialog.data-dialog pre{background:none;border:0 none;box-shadow:none;margin:0;color:#f2f2f2}.form-builder-dialog.positioned{transform:translate(-50%, -100%)}.form-builder-dialog.positioned .button-wrap::before{content:"";width:0;height:0;border-left:15px solid transparent;border-right:15px solid transparent;border-top:10px solid #fff;position:absolute;left:50%;top:100%;transform:translate(-50%, 10px)}.form-builder-dialog .button-wrap{position:relative;margin-top:10px;text-align:right;clear:both}.form-builder-dialog .button-wrap .btn{margin-left:10px}`, ""]), t.default = n;
        }, function(e2, t, r) {
          var o = r(11), n = r(19), i = r(22), l = Math.max, a = Math.min;
          e2.exports = function(e3, t2, r2) {
            var s, d, c, u, f, p, m = 0, b = false, h = false, g = true;
            if (typeof e3 != "function")
              throw new TypeError("Expected a function");
            function y(t3) {
              var r3 = s, o2 = d;
              return s = d = void 0, m = t3, u = e3.apply(o2, r3);
            }
            function w(e4) {
              return m = e4, f = setTimeout(x, t2), b ? y(e4) : u;
            }
            function v(e4) {
              var r3 = e4 - p;
              return p === void 0 || r3 >= t2 || r3 < 0 || h && e4 - m >= c;
            }
            function x() {
              var e4 = n();
              if (v(e4))
                return A(e4);
              f = setTimeout(x, function(e5) {
                var r3 = t2 - (e5 - p);
                return h ? a(r3, c - (e5 - m)) : r3;
              }(e4));
            }
            function A(e4) {
              return f = void 0, g && s ? y(e4) : (s = d = void 0, u);
            }
            function O() {
              var e4 = n(), r3 = v(e4);
              if (s = arguments, d = this, p = e4, r3) {
                if (f === void 0)
                  return w(p);
                if (h)
                  return clearTimeout(f), f = setTimeout(x, t2), y(p);
              }
              return f === void 0 && (f = setTimeout(x, t2)), u;
            }
            return t2 = i(t2) || 0, o(r2) && (b = !!r2.leading, c = (h = "maxWait" in r2) ? l(i(r2.maxWait) || 0, t2) : c, g = "trailing" in r2 ? !!r2.trailing : g), O.cancel = function() {
              f !== void 0 && clearTimeout(f), m = 0, s = p = d = f = void 0;
            }, O.flush = function() {
              return f === void 0 ? u : A(n());
            }, O;
          };
        }, function(e2, t, r) {
          var o = r(13);
          e2.exports = function() {
            return o.Date.now();
          };
        }, function(e2, t, r) {
          (function(t2) {
            var r2 = typeof t2 == "object" && t2 && t2.Object === Object && t2;
            e2.exports = r2;
          }).call(this, r(21));
        }, function(e2, t) {
          var r;
          r = function() {
            return this;
          }();
          try {
            r = r || new Function("return this")();
          } catch (e3) {
            typeof window == "object" && (r = window);
          }
          e2.exports = r;
        }, function(e2, t, r) {
          var o = r(23), n = r(11), i = r(25), l = /^[-+]0x[0-9a-f]+$/i, a = /^0b[01]+$/i, s = /^0o[0-7]+$/i, d = parseInt;
          e2.exports = function(e3) {
            if (typeof e3 == "number")
              return e3;
            if (i(e3))
              return NaN;
            if (n(e3)) {
              var t2 = typeof e3.valueOf == "function" ? e3.valueOf() : e3;
              e3 = n(t2) ? t2 + "" : t2;
            }
            if (typeof e3 != "string")
              return e3 === 0 ? e3 : +e3;
            e3 = o(e3);
            var r2 = a.test(e3);
            return r2 || s.test(e3) ? d(e3.slice(2), r2 ? 2 : 8) : l.test(e3) ? NaN : +e3;
          };
        }, function(e2, t, r) {
          var o = r(24), n = /^\s+/;
          e2.exports = function(e3) {
            return e3 ? e3.slice(0, o(e3) + 1).replace(n, "") : e3;
          };
        }, function(e2, t) {
          var r = /\s/;
          e2.exports = function(e3) {
            for (var t2 = e3.length; t2-- && r.test(e3.charAt(t2)); )
              ;
            return t2;
          };
        }, function(e2, t, r) {
          var o = r(26), n = r(29);
          e2.exports = function(e3) {
            return typeof e3 == "symbol" || n(e3) && o(e3) == "[object Symbol]";
          };
        }, function(e2, t, r) {
          var o = r(14), n = r(27), i = r(28), l = o ? o.toStringTag : void 0;
          e2.exports = function(e3) {
            return e3 == null ? e3 === void 0 ? "[object Undefined]" : "[object Null]" : l && l in Object(e3) ? n(e3) : i(e3);
          };
        }, function(e2, t, r) {
          var o = r(14), n = Object.prototype, i = n.hasOwnProperty, l = n.toString, a = o ? o.toStringTag : void 0;
          e2.exports = function(e3) {
            var t2 = i.call(e3, a), r2 = e3[a];
            try {
              e3[a] = void 0;
              var o2 = true;
            } catch (e4) {
            }
            var n2 = l.call(e3);
            return o2 && (t2 ? e3[a] = r2 : delete e3[a]), n2;
          };
        }, function(e2, t) {
          var r = Object.prototype.toString;
          e2.exports = function(e3) {
            return r.call(e3);
          };
        }, function(e2, t) {
          e2.exports = function(e3) {
            return e3 != null && typeof e3 == "object";
          };
        }, , , , , , function(t, r, o) {
          o.r(r);
          o(16);
          var n = o(15), i = o.n(n), l = o(4);
          const a = {};
          class s {
            constructor(e2) {
              this.formData = {}, this.formID = e2, this.layout = "", a[e2] = this;
            }
          }
          var d = o(2), c = o.n(d), u = o(5), f = o(10), p = o(0), m = o(3), b = o(1), h = o(6);
          function g(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          class y {
            constructor(e2, t2, r2) {
              this.data = a[e2], this.d = l.d[e2], this.doCancel = false, this.layout = t2, this.handleKeyDown = this.handleKeyDown.bind(this), this.formBuilder = r2, this.toastTimer = null;
            }
            startMoving(e2, t2) {
              t2.item.show().addClass("moving"), this.doCancel = true, this.from = t2.item.parent();
            }
            stopMoving(t2, r2) {
              r2.item.removeClass("moving"), this.doCancel && (r2.sender && e(r2.sender).sortable("cancel"), this.from.sortable("cancel")), this.save(), this.doCancel = false;
            }
            beforeStop(e2, t2) {
              const r2 = this, o2 = m.a.opts, n2 = r2.d.stage.childNodes.length - 1, i2 = [];
              r2.stopIndex = t2.placeholder.index() - 1, !o2.sortableControls && t2.item.parent().hasClass("frmb-control") && i2.push(true), o2.prepend && i2.push(r2.stopIndex === 0), o2.append && i2.push(r2.stopIndex + 1 === n2), r2.doCancel = i2.some((e3) => e3 === true);
            }
            getTypes(t2) {
              const r2 = { type: t2.attr("type") }, o2 = e(".fld-subtype", t2).val();
              return o2 !== r2.type && (r2.subtype = o2), r2;
            }
            fieldOptionData(t2) {
              const r2 = [], o2 = e(".sortable-options li", t2);
              return o2.each((e2) => {
                const t3 = o2[e2], n2 = t3.querySelectorAll("input[type=text], input[type=number], select"), i2 = t3.querySelectorAll("input[type=checkbox], input[type=radio]"), l2 = {};
                Object(p.j)(n2, (e3) => {
                  const t4 = n2[e3], r3 = t4.dataset.attr;
                  l2[r3] = t4.value;
                }), Object(p.j)(i2, (e3) => {
                  const t4 = i2[e3], r3 = t4.getAttribute("data-attr");
                  l2[r3] = t4.checked;
                }), r2.push(l2);
              }), r2;
            }
            xmlSave(e2) {
              const t2 = this.prepData(e2), r2 = new XMLSerializer(), o2 = ["<fields>"];
              t2.forEach((e3) => {
                const { values: t3 } = e3, r3 = g(e3, ["values"]);
                let n3 = [`<field ${Object(p.F)(r3)}>`];
                if (l.e.includes(e3.type)) {
                  const e4 = t3.map((e5) => Object(p.t)("option", e5.label, e5).outerHTML);
                  n3 = n3.concat(e4);
                }
                n3.push("</field>"), o2.push(n3);
              }), o2.push("</fields>");
              const n2 = Object(p.t)("form-template", Object(p.i)(o2).join(""));
              return r2.serializeToString(n2);
            }
            prepData(t2) {
              const r2 = [], o2 = this.d, n2 = this;
              if (t2.childNodes.length !== 0) {
                const i2 = [];
                Object(p.j)(t2.childNodes, function(t3, r3) {
                  e(r3).find("li.form-field").each(function(e2, t4) {
                    i2.push(t4);
                  });
                }), Object(p.j)(t2.childNodes, function(t3, r3) {
                  const o3 = e(r3);
                  o3.is("li") && o3.hasClass("form-field") && i2.push(r3);
                }), i2.length && i2.forEach((t3) => {
                  const i3 = e(t3);
                  if (!i3.hasClass("disabled-field")) {
                    let l2 = n2.getTypes(i3);
                    const a2 = e(".roles-field:checked", t3), s2 = a2.map((e2) => a2[e2].value).get();
                    if (l2 = Object.assign({}, l2, n2.getAttrVals(t3)), l2.subtype) {
                      if (l2.subtype === "quill") {
                        const e2 = l2.name + "-preview";
                        if (window.fbEditors.quill[e2]) {
                          const t4 = window.fbEditors.quill[e2].instance.getContents();
                          l2.value = window.JSON.stringify(t4.ops);
                        }
                      } else if (l2.subtype === "tinymce" && window.tinymce) {
                        const e2 = l2.name + "-preview";
                        if (window.tinymce.editors[e2]) {
                          const t4 = window.tinymce.editors[e2];
                          l2.value = t4.getContent();
                        }
                      }
                    }
                    if (s2.length && (l2.role = s2.join(",")), l2.className = l2.className || l2.class, l2.className && i3.attr("addeddefaultcolumnclass") == "true" && i3.closest(this.formBuilder.rowWrapperClassSelector).children().length == 1 && l2.className.includes(m.a.opts.defaultGridColumnClass)) {
                      const e2 = Object(p.m)(l2.className);
                      e2 && e2.length > 0 && e2.forEach((e3) => {
                        l2.className = l2.className.replace(e3, "").trim();
                      });
                    }
                    if (l2.className) {
                      const e2 = /(?:^|\s)btn-(.*?)(?:\s|$)/g.exec(l2.className);
                      e2 && (l2.style = e2[1]);
                    }
                    l2 = Object(p.D)(l2);
                    l2.type && l2.type.match(o2.optionFieldsRegEx) && (l2.values = n2.fieldOptionData(i3)), r2.push(l2);
                  }
                });
              }
              return r2;
            }
            getData(e2) {
              const t2 = this.data;
              if (e2 || (e2 = m.a.opts.formData), !e2)
                return false;
              const r2 = { xml: (e3) => Array.isArray(e3) ? e3 : Object(p.w)(e3), json: (e3) => typeof e3 == "string" ? window.JSON.parse(e3) : e3 };
              return t2.formData = r2[m.a.opts.dataType](e2) || [], t2.formData;
            }
            save(e2) {
              const t2 = this, r2 = this.data, o2 = this.d.stage, n2 = { xml: (e3) => t2.xmlSave(o2, e3), json: (e3) => window.JSON.stringify(t2.prepData(o2), null, e3 && "  ") };
              return r2.formData = n2[m.a.opts.dataType](e2), document.dispatchEvent(u.a.formSaved), r2.formData;
            }
            incrementId(e2) {
              const t2 = e2.lastIndexOf("-"), r2 = parseInt(e2.substring(t2 + 1)) + 1;
              return `${e2.substring(0, t2)}-${r2}`;
            }
            getAttrVals(t2) {
              const r2 = /* @__PURE__ */ Object.create(null), o2 = t2.querySelectorAll('[class*="fld-"]');
              return Object(p.j)(o2, (t3) => {
                const n2 = o2[t3], i2 = Object(p.d)(n2.getAttribute("name")), l2 = [[n2.attributes.contenteditable, () => m.a.opts.dataType === "xml" ? Object(p.h)(n2.innerHTML) : n2.innerHTML], [n2.type === "checkbox", () => n2.checked], [n2.type === "number" && n2.value !== "", () => Number(n2.value)], [n2.attributes.multiple, () => e(n2).val()], [true, () => n2.value]].find(([e2]) => !!e2)[1]();
                r2[i2] = l2;
              }), r2;
            }
            updatePreview(t2) {
              const r2 = this.d, o2 = t2.attr("class"), n2 = t2[0];
              if (o2.includes("input-control"))
                return;
              const i2 = t2.attr("type"), a2 = e(".prev-holder", n2);
              let s2 = Object.assign({}, this.getAttrVals(n2), { type: i2 });
              i2.match(r2.optionFieldsRegEx) && (s2.values = [], s2.multiple = e('[name="multiple"]', n2).is(":checked"), e(".sortable-options li", n2).each(function(t3, r3) {
                const o3 = { selected: e(".option-selected", r3).is(":checked"), value: e(".option-value", r3).val(), label: e(".option-label", r3).val() };
                s2.values.push(o3);
              })), s2 = Object(p.D)(s2, true), s2.className = this.classNames(n2, s2), t2.data("fieldData", s2);
              const d2 = h.a.lookup(s2.type), c2 = d2 ? d2.class : b.a.getClass(s2.type, s2.subtype), f2 = this.layout.build(c2, s2);
              Object(l.b)(a2[0]), a2[0].appendChild(f2), f2.dispatchEvent(u.a.fieldRendered);
            }
            disabledTT(e2) {
              const t2 = e2.querySelectorAll(".disabled-field");
              Object(p.j)(t2, (e3) => {
                const r2 = t2[e3], o2 = c.a.get("fieldNonEditable");
                if (o2) {
                  const e4 = Object(p.t)("p", o2, { className: "frmb-tt" });
                  r2.appendChild(e4), r2.addEventListener("mousemove", (t3) => ((e5, t4) => {
                    const r3 = t4.field.getBoundingClientRect(), o3 = e5.clientX - r3.left - 21, n2 = e5.clientY - r3.top - t4.tt.offsetHeight - 12;
                    t4.tt.style.transform = `translate(${o3}px, ${n2}px)`;
                  })(t3, { tt: e4, field: r2 }));
                }
              });
            }
            classNames(t2, r2) {
              const o2 = t2.querySelector(".fld-className"), n2 = t2.querySelector(".btn-style"), i2 = n2 && n2.value;
              if (!o2)
                return;
              const { type: l2 } = r2, a2 = o2.multiple ? e(o2).val() : o2.value.trim().split(" "), s2 = { button: "btn", submit: "btn" }[l2];
              if (s2 && i2) {
                for (let e2 = 0; e2 < a2.length; e2++) {
                  const t3 = new RegExp(`^${s2}-.*`, "g");
                  a2[e2].match(t3) ? a2.splice(e2, 1, s2 + "-" + i2) : a2.push(s2 + "-" + i2);
                }
                a2.push(s2);
              }
              const d2 = Object(p.E)(a2).join(" ").trim();
              return o2.value = d2, d2;
            }
            closeConfirm(e2, t2) {
              e2 || (e2 = document.getElementsByClassName("form-builder-overlay")[0]), e2 && Object(l.f)(e2), t2 || (t2 = document.getElementsByClassName("form-builder-dialog")[0]), t2 && Object(l.f)(t2), document.removeEventListener("keydown", this.handleKeyDown, false), document.dispatchEvent(u.a.modalClosed);
            }
            handleKeyDown(e2) {
              (e2.keyCode || e2.which) === 27 && (e2.preventDefault(), this.closeConfirm.call(this));
            }
            editorLayout(e2) {
              return { left: { stage: "pull-right", controls: "pull-left" }, right: { stage: "pull-left", controls: "pull-right" } }[e2] || "";
            }
            showOverlay() {
              const e2 = Object(p.t)("div", null, { className: "form-builder-overlay" });
              return document.body.appendChild(e2), e2.classList.add("visible"), e2.addEventListener("click", ({ target: e3 }) => this.closeConfirm(e3), false), document.addEventListener("keydown", this.handleKeyDown, false), e2;
            }
            confirm(e2, t2, r2 = false, o2 = "") {
              const n2 = this, i2 = c.a.current, l2 = n2.showOverlay(), a2 = Object(p.t)("button", i2.yes, { className: "yes btn btn-success btn-sm" }), s2 = Object(p.t)("button", i2.no, { className: "no btn btn-danger btn-sm" });
              s2.onclick = function() {
                n2.closeConfirm(l2);
              }, a2.onclick = function() {
                t2(), n2.closeConfirm(l2);
              };
              const d2 = Object(p.t)("div", [s2, a2], { className: "button-wrap" });
              o2 = "form-builder-dialog " + o2;
              const u2 = Object(p.t)("div", [e2, d2], { className: o2 });
              if (r2)
                u2.classList.add("positioned");
              else {
                const e3 = document.documentElement;
                r2 = { pageX: Math.max(e3.clientWidth, window.innerWidth || 0) / 2, pageY: Math.max(e3.clientHeight, window.innerHeight || 0) / 2 }, u2.style.position = "fixed";
              }
              return u2.style.left = r2.pageX + "px", u2.style.top = r2.pageY + "px", document.body.appendChild(u2), a2.focus(), u2;
            }
            dialog(e2, t2 = false, r2 = "") {
              const o2 = document.documentElement.clientWidth, n2 = document.documentElement.clientHeight;
              this.showOverlay(), r2 = "form-builder-dialog " + r2;
              const i2 = Object(p.t)("div", e2, { className: r2 });
              return t2 ? i2.classList.add("positioned") : (t2 = { pageX: Math.max(o2, window.innerWidth || 0) / 2, pageY: Math.max(n2, window.innerHeight || 0) / 2 }, i2.style.position = "fixed"), i2.style.left = t2.pageX + "px", i2.style.top = t2.pageY + "px", document.body.appendChild(i2), document.dispatchEvent(u.a.modalOpened), r2.indexOf("data-dialog") !== -1 && document.dispatchEvent(u.a.viewData), i2;
            }
            confirmRemoveAll(t2) {
              const r2 = this, o2 = t2.target.id.match(/frmb-\d{13}/)[0], n2 = document.getElementById(o2), i2 = c.a.current, l2 = e("li.form-field", n2), a2 = t2.target.getBoundingClientRect(), s2 = document.body.getBoundingClientRect(), d2 = { pageX: a2.left + a2.width / 2, pageY: a2.top - s2.top - 12 };
              l2.length ? r2.confirm(i2.clearAllMessage, () => {
                r2.removeAllFields.call(r2, n2), m.a.opts.persistDefaultFields && m.a.opts.defaultFields ? this.addDefaultFields() : m.a.opts.notify.success(i2.allFieldsRemoved), m.a.opts.onClearAll();
              }, d2) : r2.dialog(i2.noFieldsToClear, d2);
            }
            addDefaultFields() {
              m.a.opts.defaultFields.forEach((e2) => this.formBuilder.prepFieldVars(e2)), this.d.stage.classList.remove("empty");
            }
            removeAllFields(e2) {
              const t2 = c.a.current, r2 = m.a.opts, o2 = [];
              if (!e2.querySelectorAll(this.formBuilder.fieldSelector).length)
                return false;
              r2.prepend && o2.push(true), r2.append && o2.push(true), o2.some(Boolean) || (e2.classList.add("empty"), e2.dataset.content = t2.getStarted), this.emptyStage(e2);
            }
            emptyStage(e2) {
              Object(l.b)(e2).classList.remove("removing"), this.save();
            }
            setFieldOrder(t2) {
              if (!m.a.opts.sortableControls)
                return false;
              const { sessionStorage: r2, JSON: o2 } = window, n2 = [];
              return t2.children().each((t3, r3) => {
                const o3 = e(r3).data("type");
                o3 && n2.push(o3);
              }), r2 && r2.setItem("fieldOrder", o2.stringify(n2)), n2;
            }
            closeAllEdit() {
              e(this.d.stage).find("li.form-field").each((e2, t2) => {
                this.closeField(t2.id, false);
              });
            }
            toggleEdit(t2, r2 = true) {
              const o2 = document.getElementById(t2);
              return o2 ? e(o2).hasClass("editing") ? this.closeField(t2, r2) : this.openField(t2, r2) : o2;
            }
            closeField(t2, r2 = true) {
              const o2 = this, n2 = document.getElementById(t2);
              if (!n2)
                return n2;
              const i2 = e(".frm-holder", n2), l2 = e(".prev-holder", n2);
              let a2 = false;
              if (e(n2).hasClass("editing") && (a2 = true), !a2)
                return n2;
              n2.classList.toggle("editing"), e(".toggle-form", n2).toggleClass("open"), r2 ? (l2.slideToggle(250), i2.slideToggle(250)) : (l2.toggle(), i2.toggle()), this.updatePreview(e(n2));
              const s2 = e("#" + t2), d2 = e(`#${t2}-cont`);
              d2.append(s2), this.removeContainerProtection(d2.attr("id")), m.a.opts.onCloseFieldEdit(i2[0]), document.dispatchEvent(u.a.fieldEditClosed);
              const c2 = s2.find(".prev-holder"), f2 = setTimeout(() => {
                clearTimeout(f2);
                o2.tmpCleanPrevHolder(c2).forEach((e2) => {
                  if (e2.columnInfo.columnSize) {
                    d2.attr("class") != e2.columnInfo.columnSize && (d2.attr("class", `${e2.columnInfo.columnSize} ${this.formBuilder.colWrapperClass}`), o2.tmpCleanPrevHolder(c2));
                  }
                });
              }, 300);
              return n2;
            }
            openField(t2, r2 = true) {
              const o2 = document.getElementById(t2);
              if (!o2)
                return o2;
              const n2 = e(".frm-holder", o2), i2 = e(".prev-holder", o2);
              let l2 = false;
              if (e(o2).hasClass("editing") && (l2 = true), l2)
                return o2;
              o2.classList.toggle("editing"), e(".toggle-form", o2).toggleClass("open"), r2 ? (i2.slideToggle(250), n2.slideToggle(250)) : (i2.toggle(), n2.toggle()), this.updatePreview(e(o2));
              const a2 = e("#" + t2), s2 = e(`#${t2}-cont`), d2 = s2.closest(this.formBuilder.rowWrapperClassSelector);
              return this.formBuilder.preserveTempContainers.push(s2.attr("id")), a2.insertAfter(d2), this.formBuilder.currentEditPanel = n2[0], m.a.opts.onOpenFieldEdit(n2[0]), document.dispatchEvent(u.a.fieldEditOpened), e(document).trigger("fieldOpened", [{ rowWrapperID: d2.attr("id") }]), o2;
            }
            getStyle(e2, t2 = false) {
              let r2;
              return window.getComputedStyle ? r2 = window.getComputedStyle(e2, null) : e2.currentStyle && (r2 = e2.currentStyle), t2 ? r2[t2] : r2;
            }
            stickyControls() {
              const { controls: t2, stage: r2 } = this.d, o2 = e(t2).parent(), n2 = t2.getBoundingClientRect(), { top: i2 } = r2.getBoundingClientRect();
              e(window).scroll(function(l2) {
                const a2 = e(l2.target).scrollTop(), s2 = { top: 5, bottom: "auto", right: "auto", left: n2.left }, d2 = Object.assign({}, s2, m.a.opts.stickyControls.offset);
                if (a2 > i2) {
                  const e2 = { position: "sticky" }, n3 = Object.assign(e2, d2), i3 = t2.getBoundingClientRect(), l3 = r2.getBoundingClientRect(), s3 = i3.top + i3.height, c2 = l3.top + l3.height, u2 = s3 === c2 && i3.top > a2;
                  s3 > c2 && i3.top !== l3.top && o2.css({ position: "absolute", top: "auto", bottom: 0, right: 0, left: "auto" }), (s3 < c2 || u2) && o2.css(n3);
                } else
                  t2.parentElement.removeAttribute("style");
              });
            }
            showData() {
              let e2 = this.getFormData(m.a.opts.dataType, true);
              m.a.opts.dataType === "xml" && (e2 = Object(p.h)(e2));
              const t2 = Object(p.t)("code", e2, { className: "formData-" + m.a.opts.dataType });
              this.dialog(Object(p.t)("pre", t2), null, "data-dialog");
            }
            removeField(t2, r2 = 250) {
              let o2 = false;
              const n2 = this, i2 = this.d.stage, l2 = i2.getElementsByClassName("form-field");
              if (!l2.length)
                return m.a.opts.notify.warning("No fields to remove"), false;
              const a2 = t2 && document.getElementById(t2);
              if (!t2 || !a2) {
                const e2 = [].slice.call(l2).map((e3) => e3.id);
                m.a.opts.notify.warning("fieldID required to remove specific fields."), m.a.opts.notify.warning("Removing last field since no ID was supplied."), m.a.opts.notify.warning("Available IDs: " + e2.join(", ")), t2 = i2.lastChild.id;
              }
              const s2 = e(a2), d2 = s2.closest(this.formBuilder.rowWrapperClassSelector);
              if (!a2)
                return m.a.opts.notify.warning("Field not found"), false;
              s2.slideUp(r2, function() {
                s2.removeClass("deleting"), s2.remove(), o2 = true, n2.save(), i2.childNodes.length || (i2.classList.add("empty"), i2.dataset.content = c.a.current.getStarted);
              });
              const f2 = m.a.opts.typeUserEvents[a2.type];
              if (f2 && f2.onremove && f2.onremove(a2), document.dispatchEvent(u.a.fieldRemoved), d2.length) {
                this.removeContainerProtection(t2 + "-cont");
                const r3 = setTimeout(() => {
                  clearTimeout(r3), e(document).trigger("checkRowCleanup", [{ rowWrapperID: d2.attr("id") }]);
                }, m.e);
              }
              return o2;
            }
            processActionButtons(e2) {
              const { label: t2, events: r2 } = e2, o2 = g(e2, ["label", "events"]);
              let n2 = t2;
              const i2 = this.data;
              n2 = n2 ? c.a.current[n2] || n2 : o2.id ? c.a.current[o2.id] || Object(p.e)(o2.id) : "", o2.id ? o2.id = `${i2.formID}-${o2.id}-action` : o2.id = `${i2.formID}-action-${Math.round(1e3 * Math.random())}`;
              const l2 = Object(p.t)("button", n2, o2);
              if (r2)
                for (const e3 in r2)
                  r2.hasOwnProperty(e3) && l2.addEventListener(e3, (t3) => r2[e3](t3));
              return l2;
            }
            processSubtypes(e2) {
              const t2 = m.a.opts.disabledSubtypes;
              for (const t3 in e2)
                e2.hasOwnProperty(t3) && b.a.register(e2[t3], b.a.getClass(t3), t3);
              const r2 = b.a.getRegisteredSubtypes(), o2 = Object.entries(r2).reduce((e3, [r3, o3]) => (e3[r3] = t2[r3] && Object(p.B)(t2[r3], o3) || o3, e3), {}), n2 = {};
              for (const e3 in o2)
                if (o2.hasOwnProperty(e3)) {
                  const t3 = [];
                  for (const r3 of o2[e3]) {
                    const o3 = b.a.getClass(e3, r3), n3 = o3.mi18n("subtype." + r3) || o3.mi18n(r3) || r3;
                    t3.push({ label: n3, value: r3 });
                  }
                  n2[e3] = t3;
                }
              return n2;
            }
            editorUI(e2) {
              const t2 = this.d, r2 = this.data, o2 = e2 || r2.formID;
              t2.editorWrap = Object(p.t)("div", null, { id: r2.formID + "-form-wrap", className: "form-wrap form-builder " + Object(p.u)() }), t2.stage = Object(p.t)("ul", null, { id: o2, className: "frmb stage-wrap " + r2.layout.stage }), t2.controls = Object(p.t)("ul", null, { id: o2 + "-control-box", className: "frmb-control" });
              const n2 = this.formActionButtons();
              t2.formActions = Object(p.t)("div", n2, { className: "form-actions btn-group" });
            }
            formActionButtons() {
              const e2 = m.a.opts;
              return e2.actionButtons.map((t2) => {
                if (t2.id && e2.disabledActionButtons.indexOf(t2.id) === -1)
                  return this.processActionButtons(t2);
              }).filter(Boolean);
            }
            processOptions(e2) {
              const t2 = this, { actionButtons: r2, replaceFields: o2 } = e2, n2 = g(e2, ["actionButtons", "replaceFields"]);
              let i2 = n2.fieldEditContainer;
              typeof n2.fieldEditContainer == "string" && (i2 = document.querySelector(n2.fieldEditContainer));
              const l2 = [{ type: "button", id: "clear", className: "clear-all btn btn-danger", events: { click: t2.confirmRemoveAll.bind(t2) } }, { type: "button", label: "viewJSON", id: "data", className: "btn btn-default get-data", events: { click: t2.showData.bind(t2) } }, { type: "button", id: "save", className: "btn btn-primary save-template", events: { click: (e3) => {
                t2.save(), m.a.opts.onSave(e3, t2.data.formData);
              } } }].concat(r2);
              return n2.fields = n2.fields.concat(o2), n2.disableFields = n2.disableFields.concat(o2.map(({ type: e3 }) => e3 && e3)), n2.dataType === "xml" && (n2.disableHTMLLabels = true), m.a.opts = Object.assign({}, { actionButtons: l2 }, { fieldEditContainer: i2 }, n2), m.a.opts;
            }
            input(e2 = {}) {
              return Object(p.t)("input", null, e2);
            }
            getFormData(e2 = "js", t2 = false) {
              this.closeAllEdit();
              const r2 = this;
              return { js: () => r2.prepData(r2.d.stage), xml: () => r2.xmlSave(r2.d.stage), json: (e3) => window.JSON.stringify(r2.prepData(r2.d.stage), null, e3 && "  ") }[e2](t2);
            }
            tmpCleanPrevHolder(t2) {
              const r2 = this, o2 = [], n2 = t2.find(".form-group");
              function i2(e2) {
                var t3 = e2.attr("class");
                if (t3 !== void 0 && t3 !== false) {
                  const t4 = r2.tryParseColumnInfo(e2[0]);
                  e2.attr("class", e2.attr("class").replace("col-", "tmp-col-")), e2.attr("class", e2.attr("class").replace("row", "tmp-row"));
                  const n3 = {};
                  n3.field = e2, n3.columnInfo = t4, o2.push(n3);
                }
              }
              return i2(n2), n2.find("*").each(function(t3, r3) {
                i2(e(r3));
              }), o2;
            }
            tryParseColumnInfo(e2) {
              const t2 = {};
              if (e2.className) {
                const r2 = Object(p.m)(e2.className);
                r2 && r2.length > 0 && r2.forEach((e3) => {
                  e3.startsWith("row-") ? t2.rowNumber = parseInt(e3.replace("row-", "").trim()) : t2.columnSize = e3;
                });
              }
              return t2;
            }
            removeContainerProtection(e2) {
              var t2 = this.formBuilder.preserveTempContainers.indexOf(e2);
              t2 !== -1 && this.formBuilder.preserveTempContainers.splice(t2, 1);
            }
            toggleHighlight(e2, t2 = 600) {
              e2.addClass("moveHighlight"), setTimeout(function() {
                e2.removeClass("moveHighlight");
              }, t2);
            }
            showToast(t2, r2 = 3e3) {
              this.toastTimer != null && (window.clearTimeout(this.toastTimer), this.toastTimer = null), this.toastTimer = setTimeout(function() {
                e(".snackbar").removeClass("show");
              }, r2), e(".snackbar").addClass("show").html(t2);
            }
            getDistanceBetweenPoints(e2, t2, r2, o2) {
              const n2 = r2 - e2, i2 = o2 - t2;
              return Math.floor(Math.sqrt(i2 * i2 + n2 * n2));
            }
            getRowClass(e2) {
              if (!e2)
                return;
              const t2 = e2.split(" ").filter((e3) => e3.startsWith("row-"));
              return t2 && t2.length > 0 ? t2[0] : void 0;
            }
            getRowValue(e2) {
              if (!e2)
                return 0;
              const t2 = this.getRowClass(e2);
              return t2 ? parseInt(t2.split("-")[1]) : void 0;
            }
            changeRowClass(e2, t2) {
              const r2 = this.getRowClass(e2);
              return e2.replace(r2, "row-" + t2);
            }
            getBootstrapColumnValue(e2) {
              if (!e2)
                return 0;
              const t2 = this.getBootstrapColumnClass(e2);
              return t2 ? parseInt(t2.split("-")[2]) : void 0;
            }
            getBootstrapColumnPrefix(e2) {
              if (!e2)
                return 0;
              const t2 = this.getBootstrapColumnClass(e2);
              return t2 ? `${t2.split("-")[0]}-${t2.split("-")[1]}` : void 0;
            }
            getBootstrapColumnClass(e2) {
              if (!e2)
                return;
              const t2 = e2.split(" ").filter((e3) => p.c.test(e3));
              return t2 && t2.length > 0 ? t2[0] : void 0;
            }
            changeBootstrapClass(e2, t2) {
              const r2 = this.getBootstrapColumnClass(e2);
              return e2.replace(r2, `${this.getBootstrapColumnPrefix(e2)}-${t2}`);
            }
            syncBootstrapColumnWrapperAndClassProperty(t2, r2) {
              const o2 = e(`#${t2}-cont`);
              o2.attr("class", this.changeBootstrapClass(o2.attr("class"), r2));
              const n2 = e("#className-" + t2);
              n2.val() && n2.val(this.changeBootstrapClass(n2.val(), r2));
            }
          }
          o(12);
          var w = o(7);
          class v {
            constructor(e2, t2) {
              this.opts = e2, this.dom = t2.controls, this.custom = h.a, this.getClass = b.a.getClass, this.getRegistered = b.a.getRegistered, b.a.controlConfig = e2.controlConfig || {}, this.init();
            }
            init() {
              this.setupControls(), this.appendControls();
            }
            setupControls() {
              const e2 = this.opts;
              b.a.loadCustom(e2.controls), Object.keys(e2.fields).length && h.a.register(e2.templates, e2.fields);
              const t2 = b.a.getRegistered();
              this.registeredControls = t2;
              const r2 = h.a.getRegistered();
              r2 && jQuery.merge(t2, r2);
              const o2 = b.a.getRegisteredSubtypes();
              this.registeredSubtypes = o2, e2.sortableControls && this.dom.classList.add("sort-enabled"), this.controlList = [], this.allControls = {};
              for (let e3 = 0; e3 < t2.length; e3++) {
                const r3 = t2[e3];
                let o3, n2 = h.a.lookup(r3);
                if (n2)
                  o3 = n2.class;
                else if (n2 = {}, o3 = b.a.getClass(r3), !o3 || !o3.active(r3))
                  continue;
                const i2 = n2.icon || o3.icon(r3);
                let l2 = n2.label || o3.label(r3);
                const a2 = i2 ? "" : n2.iconClassName || "" + (w.a + r3.replace(/-[\d]{4}$/, ""));
                i2 && (l2 = `<span class="control-icon">${i2}</span>${l2}`);
                const s2 = Object(p.t)("li", Object(p.t)("span", l2), { className: `${a2} input-control input-control-${e3}` });
                s2.dataset.type = r3, this.controlList.push(r3), this.allControls[r3] = s2;
              }
              e2.inputSets.length && e2.inputSets.forEach((e3, t3) => {
                let { name: r3, label: o3 } = e3;
                r3 = r3 || Object(p.q)(o3), e3.icon && (o3 = `<span class="control-icon">${e3.icon}</span>${o3}`);
                const n2 = Object(p.t)("li", o3, { className: "input-set-control input-set-" + t3 });
                n2.dataset.type = r3, this.controlList.push(r3), this.allControls[r3] = n2;
              });
            }
            orderFields(e2) {
              const t2 = this.opts, r2 = t2.controlOrder.concat(e2);
              let o2;
              return window.sessionStorage && (t2.sortableControls ? o2 = window.sessionStorage.getItem("fieldOrder") : window.sessionStorage.removeItem("fieldOrder")), o2 ? (o2 = window.JSON.parse(o2), o2 = Object(p.E)(o2.concat(e2)), o2 = Object.keys(o2).map((e3) => o2[e3])) : o2 = Object(p.E)(r2), o2.forEach((e3) => {
                const t3 = new RegExp("-[\\d]{4}$");
                if (e3.match(t3)) {
                  const r3 = o2.indexOf(e3.replace(t3, ""));
                  r3 !== -1 && (o2.splice(o2.indexOf(e3), 1), o2.splice(r3 + 1, o2.indexOf(e3), e3));
                }
              }), t2.disableFields.length && (o2 = o2.filter((e3) => !t2.disableFields.includes(e3))), o2.filter(Boolean);
            }
            appendControls() {
              const e2 = document.createDocumentFragment();
              Object(l.b)(this.dom), this.orderFields(this.controlList).forEach((t2) => {
                const r2 = this.allControls[t2];
                r2 && e2.appendChild(r2);
              }), this.dom.appendChild(e2);
            }
          }
          function x(e2, t2) {
            if (e2 == null)
              return {};
            var r2, o2, n2 = function(e3, t3) {
              if (e3 == null)
                return {};
              var r3, o3, n3 = {}, i3 = Object.keys(e3);
              for (o3 = 0; o3 < i3.length; o3++)
                r3 = i3[o3], t3.indexOf(r3) >= 0 || (n3[r3] = e3[r3]);
              return n3;
            }(e2, t2);
            if (Object.getOwnPropertySymbols) {
              var i2 = Object.getOwnPropertySymbols(e2);
              for (o2 = 0; o2 < i2.length; o2++)
                r2 = i2[o2], t2.indexOf(r2) >= 0 || Object.prototype.propertyIsEnumerable.call(e2, r2) && (n2[r2] = e2[r2]);
            }
            return n2;
          }
          function A(e2, t2) {
            var r2 = Object.keys(e2);
            if (Object.getOwnPropertySymbols) {
              var o2 = Object.getOwnPropertySymbols(e2);
              t2 && (o2 = o2.filter(function(t3) {
                return Object.getOwnPropertyDescriptor(e2, t3).enumerable;
              })), r2.push.apply(r2, o2);
            }
            return r2;
          }
          function O(e2) {
            for (var t2 = 1; t2 < arguments.length; t2++) {
              var r2 = arguments[t2] != null ? arguments[t2] : {};
              t2 % 2 ? A(Object(r2), true).forEach(function(t3) {
                C(e2, t3, r2[t3]);
              }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e2, Object.getOwnPropertyDescriptors(r2)) : A(Object(r2)).forEach(function(t3) {
                Object.defineProperty(e2, t3, Object.getOwnPropertyDescriptor(r2, t3));
              });
            }
            return e2;
          }
          function C(e2, t2, r2) {
            return t2 in e2 ? Object.defineProperty(e2, t2, { value: r2, enumerable: true, configurable: true, writable: true }) : e2[t2] = r2, e2;
          }
          const { rowWrapperClass: j, colWrapperClass: k, tmpColWrapperClass: q, tmpRowPlaceholderClass: E, invisibleRowPlaceholderClass: N } = m.f, { rowWrapperClassSelector: S, colWrapperClassSelector: T, tmpColWrapperClassSelector: D, tmpRowPlaceholderClassSelector: B, invisibleRowPlaceholderClassSelector: L } = Object(p.l)(m.f);
          let R = false;
          function I(e2, t2, r2) {
            const o2 = this, n2 = c.a.current, a2 = "frmb-" + new Date().getTime(), d2 = new s(a2), b2 = new l.a(a2);
            let h2 = [];
            o2.preserveTempContainers = [], o2.rowWrapperClassSelector = S, o2.colWrapperClassSelector = T, o2.colWrapperClass = k, o2.fieldSelector = e2.enableEnhancedBootstrapGrid ? S : m.b, e2.layout || (e2.layout = f.a);
            const g2 = new e2.layout(e2.layoutTemplates, true), A2 = new y(a2, g2, o2), C2 = p.t;
            e2 = A2.processOptions(e2), d2.layout = A2.editorLayout(e2.controlPosition), A2.editorUI(a2), d2.formID = a2, d2.lastID = d2.formID + "-fld-0";
            const I2 = new v(e2, b2), F2 = m.a.subtypes = A2.processSubtypes(e2.subtypes), P = r2(b2.stage), M = r2(b2.controls);
            let H, z, W = false, U = false, V = false;
            function Q() {
              return !!e2.enableEnhancedBootstrapGrid;
            }
            P.sortable({ cursor: "move", opacity: 0.9, revert: 150, beforeStop: (e3, t3) => A2.beforeStop.call(A2, e3, t3), start: (e3, t3) => A2.startMoving.call(A2, e3, t3), stop: (e3, t3) => A2.stopMoving.call(A2, e3, t3), cancel: ["input", "select", "textarea", ".disabled-field", ".form-elements", ".btn", "button", ".is-locked"].join(", "), placeholder: "frmb-placeholder" }), e2.allowStageSort || P.sortable("disable"), Q() ? M.sortable({ opacity: 0.9, connectWith: S, cancel: ".formbuilder-separator", cursor: "move", scroll: false, start: (e3, t3) => {
              A2.startMoving.call(A2, e3, t3), R = true;
            }, stop: (e3, t3) => {
              A2.stopMoving.call(A2, e3, t3), R = false, we();
            }, revert: 150, beforeStop: (e3, t3) => {
              A2.beforeStop.call(A2, e3, t3);
            }, distance: 3, update: function(t3) {
              if (R = false, A2.doCancel)
                return false;
              r2(t3.target).attr("id") == M.attr("id") && pe(), A2.setFieldOrder(M), A2.doCancel = !e2.sortableControls;
            } }) : M.sortable({ helper: "clone", opacity: 0.9, connectWith: P, cancel: ".formbuilder-separator", cursor: "move", scroll: false, placeholder: "ui-state-highlight", start: (e3, t3) => A2.startMoving.call(A2, e3, t3), stop: (e3, t3) => A2.stopMoving.call(A2, e3, t3), revert: 150, beforeStop: (e3, t3) => A2.beforeStop.call(A2, e3, t3), distance: 3, update: function(t3, r3) {
              if (A2.doCancel)
                return false;
              r3.item.parent()[0] === b2.stage ? (A2.doCancel = true, Y(r3.item)) : (A2.setFieldOrder(M), A2.doCancel = !e2.sortableControls);
            } }), M.on("mouseenter", function() {
              Te() && P.children(B).addClass(N);
            });
            const Y = (t3) => {
              if (t3[0].classList.contains("input-set-control")) {
                const r3 = [], o3 = e2.inputSets.find((e3) => Object(p.q)(e3.name || e3.label) === t3[0].dataset.type);
                if (o3 && o3.showHeader) {
                  const e3 = { type: "header", subtype: "h2", id: o3.name, label: o3.label };
                  r3.push(e3);
                }
                r3.push(...o3.fields), r3.forEach((e3) => {
                  Z(e3, true), (A2.stopIndex || A2.stopIndex === 0) && A2.stopIndex++;
                });
              } else
                Z(t3, true);
            }, G = r2(b2.editorWrap);
            r2('<div class="snackbar">').appendTo(G);
            const X = C2("div", b2.controls, { id: d2.formID + "-cb-wrap", className: "cb-wrap " + d2.layout.controls });
            e2.showActionButtons && X.appendChild(b2.formActions);
            const J = C2("div", "", { id: d2.formID + "-gridModeHelp", className: "grid-mode-help" });
            X.appendChild(J), G.append(b2.stage, X), t2.type !== "textarea" ? r2(t2).append(G) : r2(t2).replaceWith(G), r2(b2.controls).on("click", "li", ({ target: e3 }) => {
              if (R)
                return;
              Te() || P.find(B).eq(0).remove();
              const t3 = r2(e3).closest("li");
              A2.stopIndex = void 0, Y(t3), A2.save.call(A2);
            });
            const Z = (t3, o3 = false) => {
              let n3 = {};
              if (t3 instanceof jQuery)
                if (n3.type = t3[0].dataset.type, n3.type) {
                  const e3 = I2.custom.lookup(n3.type);
                  if (e3)
                    n3 = Object.assign({}, e3);
                  else {
                    const e4 = I2.getClass(n3.type);
                    n3.label = e4.label(n3.type);
                  }
                } else {
                  const e3 = t3[0].attributes;
                  o3 || (n3.values = t3.children().map((e4, t4) => ({ label: r2(t4).text(), value: r2(t4).attr("value"), selected: Boolean(r2(t4).attr("selected")) })));
                  for (let t4 = e3.length - 1; t4 >= 0; t4--)
                    n3[e3[t4].name] = e3[t4].value;
                }
              else
                n3 = Object.assign({}, t3);
              n3.name || (n3.name = Object(p.v)(n3)), o3 && ["text", "number", "file", "date", "select", "textarea", "autocomplete"].includes(n3.type) && (n3.className = n3.className || "form-control");
              const i2 = /(?:^|\s)btn-(.*?)(?:\s|$)/g.exec(n3.className);
              if (i2 && (n3.style = i2[1]), o3) {
                const e3 = setTimeout(() => {
                  document.dispatchEvent(u.a.fieldAdded), clearTimeout(e3);
                }, 10);
              }
              e2.onAddField(d2.lastID, n3), ue(n3, o3), e2.onAddFieldAfter(d2.lastID, n3), b2.stage.classList.remove("empty");
            };
            o2.prepFieldVars = Z;
            const K = function(t3) {
              (t3 = A2.getData(t3)) && t3.length ? (t3.forEach((e3) => {
                $(e3);
              }), t3.forEach((e3) => Z(Object(p.D)(e3))), b2.stage.classList.remove("empty")) : e2.defaultFields && e2.defaultFields.length ? (m.a.opts.defaultFields.forEach((e3) => $(e3)), A2.addDefaultFields()) : e2.prepend || e2.append || (b2.stage.classList.add("empty"), b2.stage.dataset.content = c.a.get("getStarted")), (() => {
                const t4 = [], o3 = (t5) => C2("li", e2[t5], { className: "disabled-field form-" + t5 });
                return e2.prepend && !r2(".disabled-field.form-prepend", b2.stage).length && (t4.push(true), P.prepend(o3("prepend"))), e2.append && !r2(".disabled-field.form-.append", b2.stage).length && (t4.push(true), P.append(o3("append"))), A2.disabledTT(b2.stage), t4.some((e3) => e3 === true);
              })() && b2.stage.classList.remove("empty"), A2.save();
            };
            function $(e3) {
              const t3 = A2.getRowValue(e3.className);
              t3 && !h2.includes(t3) && h2.push(t3);
            }
            const _ = (t3) => {
              const { type: r3 } = t3, o3 = [], n3 = I2.getClass(r3), i2 = ((e3) => {
                const t4 = ["required", "label", "description", "placeholder", "className", "name", "access", "value"], r4 = !["header", "paragraph", "file", "autocomplete"].concat(b2.optionFields).includes(e3), o4 = { autocomplete: t4.concat(["options", "requireValidOption"]), button: ["label", "subtype", "style", "className", "name", "value", "access"], checkbox: ["required", "label", "description", "toggle", "inline", "className", "name", "access", "other", "options"], text: t4.concat(["subtype", "maxlength"]), date: t4, file: t4.concat(["subtype", "multiple"]), header: ["label", "subtype", "className", "access"], hidden: ["name", "value", "access"], paragraph: ["label", "subtype", "className", "access"], number: t4.concat(["min", "max", "step"]), select: t4.concat(["multiple", "options"]), textarea: t4.concat(["subtype", "maxlength", "rows"]) };
                e3 in I2.registeredSubtypes && !(e3 in o4) && (o4[e3] = t4.concat(["subtype"])), o4["checkbox-group"] = o4.checkbox, o4["radio-group"] = o4.checkbox;
                const n4 = o4[e3];
                return e3 === "radio-group" && Object(p.y)("toggle", n4), ["header", "paragraph", "button"].includes(e3) && Object(p.y)("description", n4), r4 || Object(p.y)("value", n4), n4 || t4;
              })(r3), l2 = { required: () => ce(t3), toggle: () => ie("toggle", t3, { first: c.a.get("toggle") }), inline: () => {
                const e3 = { first: c.a.get("inline"), second: c.a.get("inlineDesc", r3.replace("-group", "")) };
                return ie("inline", t3, e3);
              }, label: () => de("label", t3), description: () => de("description", t3), subtype: () => se("subtype", t3, F2[r3]), style: () => le(t3.style), placeholder: () => de("placeholder", t3), rows: () => ae("rows", t3), className: (e3) => de("className", t3, e3), name: (e3) => de("name", t3, e3), value: () => de("value", t3), maxlength: () => ae("maxlength", t3), access: () => {
                const r4 = [`<div class="available-roles" ${t3.role ? 'style="display:block"' : ""}>`];
                for (a3 in e2.roles)
                  if (e2.roles.hasOwnProperty(a3)) {
                    const t4 = `fld-${d2.lastID}-roles-${a3}`, o5 = { type: "checkbox", name: "roles[]", value: a3, id: t4, className: "roles-field" };
                    s2.includes(a3) && (o5.checked = "checked"), r4.push(`<label for="${t4}">`), r4.push(A2.input(o5).outerHTML), r4.push(` ${e2.roles[a3]}</label>`);
                  }
                r4.push("</div>");
                const o4 = { first: c.a.get("roles"), second: c.a.get("limitRole"), content: r4.join("") };
                return ie("access", t3, o4);
              }, other: () => ie("other", t3, { first: c.a.get("enableOther"), second: c.a.get("enableOtherMsg") }), options: () => function(e3) {
                const { type: t4, values: r4 } = e3;
                let o4;
                const n4 = [C2("a", c.a.get("addOption"), { className: "add add-opt" })], i3 = [C2("label", c.a.get("selectOptions"), { className: "false-label" })], l3 = e3.multiple || t4 === "checkbox-group", a4 = (e4) => {
                  const t5 = c.a.get("optionCount", e4);
                  return { selected: false, label: t5, value: Object(p.q)(t5) };
                };
                if (r4 && r4.length)
                  o4 = r4.map((e4) => Object.assign({}, { selected: false }, e4));
                else {
                  let e4 = [1, 2, 3];
                  ["checkbox-group", "checkbox"].includes(t4) && (e4 = [1]), o4 = e4.map(a4);
                  const r5 = o4[0];
                  r5.hasOwnProperty("selected") && t4 !== "radio-group" && (r5.selected = true);
                }
                const s3 = C2("div", n4, { className: "option-actions" }), d3 = C2("ol", o4.map((e4, r5) => {
                  const o5 = m.a.opts.onAddOption(e4, { type: t4, index: r5, isMultiple: l3 });
                  return Ae(o5, l3);
                }), { className: "sortable-options" }), u3 = C2("div", [d3, s3], { className: "sortable-options-wrap" });
                return i3.push(u3), C2("div", i3, { className: "form-group field-options" }).outerHTML;
              }(t3), requireValidOption: () => ie("requireValidOption", t3, { first: " ", second: c.a.get("requireValidOption") }), multiple: () => {
                const e3 = { default: { first: "Multiple", second: "set multiple attribute" }, file: { first: c.a.get("multipleFiles"), second: c.a.get("allowMultipleFiles") }, select: { first: " ", second: c.a.get("selectionsMessage") } };
                return ie("multiple", t3, e3[r3] || e3.default);
              } };
              let a3;
              const s2 = t3.role !== void 0 ? t3.role.split(",") : [];
              ["min", "max", "step"].forEach((e3) => {
                l2[e3] = () => ae(e3, t3);
              });
              const u2 = ["name", "className"];
              if (Object.keys(i2).forEach((t4) => {
                const a4 = i2[t4], s3 = [true], d3 = e2.disabledAttrs.includes(a4);
                if (e2.typeUserDisabledAttrs[r3]) {
                  const t5 = e2.typeUserDisabledAttrs[r3];
                  s3.push(!t5.includes(a4));
                }
                if (n3.definition.hasOwnProperty("defaultAttrs")) {
                  const e3 = Object.keys(n3.definition.defaultAttrs);
                  s3.push(!e3.includes(a4));
                }
                if (e2.typeUserAttrs[r3]) {
                  const t5 = Object.keys(e2.typeUserAttrs[r3]);
                  s3.push(!t5.includes(a4));
                }
                d3 && !u2.includes(a4) && s3.push(false), s3.every(Boolean) && o3.push(l2[a4](d3));
              }), n3.definition.hasOwnProperty("defaultAttrs")) {
                const e3 = re(n3.definition.defaultAttrs, t3);
                o3.push(e3);
              }
              if (e2.typeUserAttrs[r3]) {
                const n4 = re(e2.typeUserAttrs[r3], t3);
                o3.push(n4);
              }
              return o3.join("");
            };
            function ee(e3) {
              return [["array", ({ options: e4 }) => !!e4], ["boolean", ({ type: e4 }) => e4 === "checkbox"], [typeof e3.value, () => true]].find((t3) => t3[1](e3))[0] || "string";
            }
            function te(e3, t3) {
              return e3.subtype && e3.subtype === t3;
            }
            function re(e3, t3) {
              const r3 = [], o3 = { array: ne, string: oe, number: ae, boolean: (e4, r4) => {
                let o4 = false;
                return e4.type === "checkbox" ? o4 = Boolean(!!r4.hasOwnProperty("value") && r4.value) : t3.hasOwnProperty(e4) ? o4 = t3[e4] : (r4.hasOwnProperty("value") || r4.hasOwnProperty("checked")) && (o4 = r4.value || r4.checked || false), ie(e4, O(O({}, r4), {}, { [e4]: o4 }), { first: r4.label });
              } };
              for (const i2 in e3)
                if (e3.hasOwnProperty(i2)) {
                  const l2 = ee(e3[i2]);
                  if (l2 !== "undefined") {
                    const a3 = c.a.get(i2), s2 = e3[i2], d3 = s2.value || "";
                    s2.value = t3[i2] || s2.value || "", s2.label && (n2[i2] = Array.isArray(s2.label) ? c.a.get(...s2.label) || s2.label[0] : s2.label), o3[l2] && r3.push(o3[l2](i2, s2)), n2[i2] = a3, s2.value = d3;
                  } else {
                    if (l2 !== "undefined" || !te(t3, i2))
                      continue;
                    r3.push(re(e3[i2], t3));
                  }
                }
              return r3.join("");
            }
            function oe(e3, t3) {
              const { class: r3, className: o3 } = t3, i2 = x(t3, ["class", "className"]);
              let l2 = { id: e3 + "-" + d2.lastID, title: i2.description || i2.label || e3.toUpperCase(), name: e3, type: i2.type || "text", className: ["fld-" + e3, (r3 || o3 || "").trim()], value: i2.value || "" };
              const a3 = `<label for="${l2.id}">${n2[e3] || ""}</label>`;
              ["checkbox", "checkbox-group", "radio-group"].includes(l2.type) || l2.className.push("form-control"), l2 = Object.assign({}, i2, l2);
              return `<div class="form-group ${e3}-wrap">${a3}${`<div class="input-wrap">${(() => {
                if (l2.type === "textarea") {
                  const e4 = l2.value;
                  return delete l2.value, `<textarea ${Object(p.b)(l2)}>${e4}</textarea>`;
                }
                return `<input ${Object(p.b)(l2)}>`;
              })()}</div>`}</div>`;
            }
            function ne(e3, t3) {
              const { multiple: r3, options: o3, label: i2, value: l2, class: a3, className: s2 } = t3, u2 = x(t3, ["multiple", "options", "label", "value", "class", "className"]), f2 = Object.keys(o3).map((e4) => {
                const t4 = { value: e4 }, r4 = o3[e4], n3 = Array.isArray(r4) ? c.a.get(...r4) || r4[0] : r4;
                return (Array.isArray(l2) ? l2.includes(e4) : e4 === l2) && (t4.selected = null), C2("option", n3, t4);
              }), p2 = { id: `${e3}-${d2.lastID}`, title: u2.description || i2 || e3.toUpperCase(), name: e3, className: `fld-${e3} form-control ${a3 || s2 || ""}`.trim() };
              r3 && (p2.multiple = true);
              const m2 = `<label for="${p2.id}">${n2[e3]}</label>`;
              Object.keys(u2).forEach(function(e4) {
                p2[e4] = u2[e4];
              });
              return `<div class="form-group ${e3}-wrap">${m2}${`<div class="input-wrap">${C2("select", f2, p2).outerHTML}</div>`}</div>`;
            }
            const ie = (e3, t3, r3 = {}) => {
              const o3 = (t4) => C2("label", t4, { for: `${e3}-${d2.lastID}` }).outerHTML, n3 = { type: "checkbox", className: "fld-" + e3, name: e3, id: `${e3}-${d2.lastID}` };
              t3[e3] && (n3.checked = true);
              const i2 = [];
              let l2 = [C2("input", null, n3).outerHTML];
              return r3.first && i2.push(o3(r3.first)), r3.second && l2.push(" ", o3(r3.second)), r3.content && l2.push(r3.content), l2 = C2("div", l2, { className: "input-wrap" }).outerHTML, C2("div", i2.concat(l2), { className: `form-group ${e3}-wrap` }).outerHTML;
            }, le = (e3) => {
              let t3 = "";
              e3 === "undefined" && (e3 = "default");
              const r3 = `<label>${n2.style}</label>`;
              return t3 += A2.input({ value: e3 || "default", type: "hidden", className: "btn-style" }).outerHTML, t3 += '<div class="btn-group" role="group">', m.g.btn.forEach((r4) => {
                const o3 = ["btn-xs", "btn", "btn-" + r4];
                e3 === r4 && o3.push("selected");
                const n3 = C2("button", c.a.get("styles.btn." + r4), { value: r4, type: "button", className: o3.join(" ") }).outerHTML;
                t3 += n3;
              }), t3 += "</div>", t3 = C2("div", [r3, t3], { className: "form-group style-wrap" }), t3.outerHTML;
            }, ae = (e3, t3) => {
              const { class: r3, className: o3, value: n3 } = t3, i2 = x(t3, ["class", "className", "value"])[e3] || n3, l2 = c.a.get(e3) || e3, a3 = { type: "number", value: i2, name: e3, placeholder: c.a.get("placeholder." + e3), className: `fld-${e3} form-control ${r3 || o3 || ""}`.trim(), id: `${e3}-${d2.lastID}` }, s2 = A2.input(Object(p.D)(a3)).outerHTML;
              return C2("div", [`<label for="${a3.id}">${l2}</label>`, `<div class="input-wrap">${s2}</div>`], { className: `form-group ${e3}-wrap` }).outerHTML;
            }, se = (e3, t3, r3) => {
              const o3 = r3.map((r4, o4) => {
                let i3 = Object.assign({ label: `${n2.option} ${o4}`, value: void 0 }, r4);
                return r4.value === t3[e3] && (i3.selected = true), i3 = Object(p.D)(i3), C2("option", i3.label, i3);
              }), i2 = { id: e3 + "-" + d2.lastID, name: e3, className: `fld-${e3} form-control` }, l2 = c.a.get(e3) || Object(p.e)(e3) || "", a3 = C2("label", l2, { for: i2.id }), s2 = C2("select", o3, i2), u2 = C2("div", s2, { className: "input-wrap" });
              return C2("div", [a3, u2], { className: `form-group ${i2.name}-wrap` }).outerHTML;
            }, de = (t3, r3, o3 = false) => {
              const n3 = ["paragraph"];
              let i2 = r3[t3] || "", l2 = c.a.get(t3);
              t3 === "label" && (n3.includes(r3.type) ? l2 = c.a.get("content") : i2 = Object(p.x)(i2));
              const a3 = c.a.get("placeholders." + t3) || "";
              let s2 = "";
              if (![].some((e3) => e3 === true)) {
                const n4 = { name: t3, placeholder: a3, className: `fld-${t3} form-control`, id: `${t3}-${d2.lastID}` }, c2 = C2("label", l2, { for: n4.id }).outerHTML;
                t3 !== "label" || e2.disableHTMLLabels ? (n4.value = i2, n4.type = "text", s2 += `<input ${Object(p.b)(n4)}>`) : (n4.contenteditable = true, s2 += C2("div", i2, n4).outerHTML);
                const u2 = `<div class="input-wrap">${s2}</div>`;
                let f2 = o3 ? "none" : "block";
                t3 === "value" && (f2 = r3.subtype && r3.subtype === "quill" && "none"), s2 = C2("div", [c2, u2], { className: `form-group ${t3}-wrap`, style: "display: " + f2 });
              }
              return s2.outerHTML;
            }, ce = (e3) => {
              const { type: t3 } = e3, r3 = [];
              let o3 = "";
              return ["header", "paragraph", "button"].includes(t3) && r3.push(true), r3.some((e4) => e4 === true) || (o3 = ie("required", e3, { first: c.a.get("required") })), o3;
            }, ue = function(t3, i2 = true) {
              const l2 = xe(t3);
              d2.lastID = A2.incrementId(d2.lastID);
              const a3 = t3.type || "text";
              let s2 = t3.label || (i2 ? n2.get(a3) || c.a.get("label") : "");
              a3 === "hidden" && (s2 = `${c.a.get(a3)}: ${t3.name}`);
              const u2 = e2.disabledFieldButtons[a3] || t3.disabledFieldButtons;
              let f2 = [C2("a", null, { type: "remove", id: "del_" + d2.lastID, className: `del-button btn ${w.a}cancel delete-confirm`, title: c.a.get("removeMessage") }), C2("a", null, { type: "edit", id: d2.lastID + "-edit", className: `toggle-form btn ${w.a}pencil`, title: c.a.get("hide") }), C2("a", null, { type: "copy", id: d2.lastID + "-copy", className: `copy-button btn ${w.a}copy`, title: c.a.get("copyButtonTooltip") })];
              Q() && f2.push(C2("a", null, { type: "grid", id: d2.lastID + "-grid", className: `grid-button btn ${w.a}grid`, title: "Grid Mode" })), u2 && Array.isArray(u2) && (f2 = f2.filter((e3) => !u2.includes(e3.type)));
              const m2 = [C2("div", f2, { className: "field-actions" })];
              m2.push(C2("label", Object(p.x)(s2), { className: "field-label" })), m2.push(C2("span", " *", { className: "required-asterisk", style: t3.required ? "display:inline" : "" }));
              const h3 = { className: "tooltip-element", tooltip: t3.description, style: t3.description ? "display:inline-block" : "display:none" };
              m2.push(C2("span", "?", h3));
              const g3 = C2("div", "", { className: "prev-holder", dataFieldId: d2.lastID });
              m2.push(g3);
              const y2 = C2("div", [_(t3), C2("a", c.a.get("close"), { className: "close-field" })], { className: "form-elements" }), v2 = C2("div", y2, { id: d2.lastID + "-holder", className: "frm-holder", dataFieldId: d2.lastID });
              o2.currentEditPanel = v2, m2.push(v2);
              const x2 = C2("li", m2, { class: a3 + "-field form-field", type: a3, id: d2.lastID }), O2 = r2(x2);
              let q2;
              if (fe(O2), O2.data("fieldData", { attrs: t3 }), A2.stopIndex !== void 0 ? r2("> li", b2.stage).eq(A2.stopIndex).before(O2) : P.append(O2), r2(".sortable-options", O2).sortable({ update: () => A2.updatePreview(O2) }), A2.updatePreview(O2), Q()) {
                const e3 = "div.row-" + l2.rowNumber;
                q2 = P.children(e3).length ? P.children(e3) : C2("div", null, { id: x2.id + "-row", className: `row row-${l2.rowNumber} ${j}` }), W && U && (H.attr("id", q2.id), H.attr("class", q2.className), H.attr("style", ""), q2 = H);
                const t4 = C2("div", null, { id: x2.id + "-cont", className: `${l2.columnSize} ${k}` });
                W && V && (H.attr("prepend") == "true" ? r2(t4).prependTo(q2) : r2(t4).insertAfter("#" + H.attr("appendAfter"))), V || r2(t4).appendTo(q2), W || P.append(q2), O2.appendTo(t4), he(q2), me(q2), l2.addedDefaultColumnClass && O2.attr("addedDefaultColumnClass", true), A2.tmpCleanPrevHolder(r2(g3));
              }
              e2.typeUserEvents[a3] && e2.typeUserEvents[a3].onadd && e2.typeUserEvents[a3].onadd(x2), i2 && (e2.editOnAdd && (A2.closeAllEdit(), A2.toggleEdit(d2.lastID, false)), x2.scrollIntoView && e2.scrollToFieldOnAdd && x2.scrollIntoView({ behavior: "smooth" })), Q() && (W && V && Ee(q2, true), we()), W = false, U = false, V = false;
            };
            function fe(e3) {
              Q() && e3.mouseenter(function(e4) {
                je || (pe(), r2(this).closest(S).prevAll(B).first().removeClass(N), r2(this).closest(S).nextAll(B).first().removeClass(N), Ce = r2(this), ke = e4.pageX, qe = e4.pageY);
              });
            }
            function pe() {
              P.find(B).addClass(N);
            }
            function me(e3) {
              const t3 = r2(e3).clone();
              if (t3.addClass(N).addClass(E).html(""), t3.css("height", "1px"), t3.attr("class", t3.attr("class").replace("row-", "")), t3.removeAttr("id"), r2(e3).index() == 0) {
                const e4 = r2(t3).clone();
                P.prepend(e4), he(e4);
              }
              t3.insertAfter(r2(e3)), he(t3);
            }
            function be() {
              P.children(B).remove(), P.children(S).each((e3, t3) => {
                me(r2(t3));
              });
            }
            function he(t3) {
              Q() && (r2(t3).sortable({ connectWith: [S], cursor: "move", opacity: 0.9, revert: 150, tolerance: "pointer", helper: function(e3, t4) {
                const r3 = t4.clone();
                return r3.find(".field-actions").remove(), r3.css({ width: "20%", height: "100px", minHeight: "60px", overflow: "hidden" }), r3;
              }, over: function(e3) {
                const t4 = r2(e3.target), o3 = t4.hasClass(E);
                o3 || ve(t4), t4.addClass("hoverDropStyleInverse"), o3 || (pe(), t4.prevAll(B).first().removeClass(N).css("height", "40px"), t4.nextAll(B).first().removeClass(N).css("height", "40px"));
              }, out: function(e3) {
                P.children(B).removeClass("hoverDropStyleInverse"), r2(e3.target).removeClass("hoverDropStyleInverse");
              }, placeholder: "hoverDropStyleInverse", receive: function(e3, t4) {
                const o3 = r2(t4.sender).attr("id") == M.attr("id"), n3 = r2(t4.item).parent().hasClass(E), i2 = r2(t4.item).parent().hasClass(E), l2 = r2(t4.item).parent().hasClass(j) && !r2(t4.item).parent().hasClass(E);
                if (n3 && !o3) {
                  const e4 = r2(t4.item), o4 = xe({}), n4 = C2("div", null, { id: e4.find("li").attr("id") + "-row", className: `row row-${o4.rowNumber} ${j}` });
                  r2(t4.item).parent().replaceWith(n4), fe(r2(t4.item)), e4.appendTo(n4), he(n4), Ne(e4.attr("id")), Se();
                }
                if (i2 && o3 && (U = true, W = true, H = r2(t4.item).parent()), l2 && o3) {
                  H = r2(t4.item).prev().hasClass("btnAddControl") ? r2(t4.item).prev() : r2(t4.item).next().hasClass("btnAddControl") ? r2(t4.item).next() : r2(t4.item).attr("prepend", "true");
                  const e4 = A2.getRowClass(r2(t4.item).parent().attr("class"));
                  H.addClass(e4), V = true, W = true, A2.stopIndex = void 0;
                }
                we(), W && (A2.doCancel = true, Y(t4.item), A2.save.call(A2)), be();
                const a3 = r2(t4.item).find("li");
                a3.length && (ge(a3), ye(a3));
              }, start: function() {
                we();
              }, stop: function(e3, t4) {
                P.children(B).removeClass("hoverDropStyleInverse"), Ee(t4.item.closest(S), true);
              }, update: function(e3, t4) {
                Ne(t4.item.attr("id"));
              } }), r2(t3).off("mouseenter"), r2(t3).on("mouseenter", function(t4) {
                !function(t5) {
                  if (!e2.enableColumnInsertMenu)
                    return;
                  r2(t5).children(T).each((e3, t6) => {
                    const o3 = r2(t6);
                    o3.addClass("colHoverTempStyle"), o3.index() == 0 && r2(`<button type="button" class=" ${q} formbuilder-icon-plus btnAddControl ${A2.getRowClass(o3.parent().attr("class"))}" prepend="true"></button>`).insertBefore(o3), r2(`<button type="button" class=" ${q} formbuilder-icon-plus btnAddControl ${A2.getRowClass(o3.parent().attr("class"))}" appendAfter="${o3.attr("id")}"></button>`).insertAfter(o3);
                  });
                }(r2(t4.currentTarget));
              }), r2(t3).off("mouseleave"), r2(t3).on("mouseleave", function(e3) {
                ve(r2(e3.currentTarget));
              }));
            }
            function ge(e3) {
              const t3 = e3.find('textarea[type="tinymce"]');
              t3.length && (window.lastFormBuilderCopiedTinyMCE = window.tinymce.get(t3.attr("id")).save());
            }
            function ye(e3) {
              A2.updatePreview(e3), A2.save.call(A2);
            }
            function we() {
              P.find(T).removeClass("colHoverTempStyle"), P.find(D).remove();
            }
            function ve(e3) {
              e3.find(D).remove(), e3.find(T).removeClass("colHoverTempStyle");
            }
            function xe(t3) {
              let r3 = {};
              return Q() ? (r3 = A2.tryParseColumnInfo(t3), function() {
                if (!r3.rowNumber) {
                  let o3;
                  o3 = h2.length == 0 ? 1 : Math.max(...h2) + 1, r3.rowNumber = o3, W && V && (r3.rowNumber = A2.getRowValue(H.attr("class"))), r3.columnSize = e2.defaultGridColumnClass, t3.className || (t3.className = ""), t3.className += ` row-${r3.rowNumber} ${r3.columnSize}`, r3.addedDefaultColumnClass = true;
                }
              }(), h2.includes(r3.rowNumber) || h2.push(r3.rowNumber), r3) : r3;
            }
            const Ae = function(e3, t3) {
              const r3 = { selected: t3 ? "checkbox" : "radio" }, o3 = { boolean: (e4, t4) => {
                const o4 = { value: e4, type: r3[t4] || "checkbox" };
                return e4 && (o4.checked = !!e4), ["input", null, o4];
              }, number: (e4) => ["input", null, { value: e4, type: "number" }], string: (e4, t4) => ["input", null, { value: e4, type: "text", placeholder: c.a.get("placeholder." + t4) || "" }], array: (e4) => ["select", e4.map(({ label: e5, value: t4 }) => C2("option", e5, { value: t4 }))], object: (e4) => {
                let { tag: t4, content: r4 } = e4;
                return [t4, r4, x(e4, ["tag", "content"])];
              } };
              e3 = O(O({}, { selected: false, label: "", value: "" }), e3);
              const n3 = Object.entries(e3).map(([e4, t4]) => {
                const r4 = Object(p.n)(t4), [n4, i3, l2] = o3[r4](t4, e4), a3 = `option-${e4} option-attr`;
                return l2["data-attr"] = e4, l2.className = l2.className ? `${l2.className} ${a3}` : a3, C2(n4, i3, l2);
              }), i2 = { className: `remove btn ${w.a}cancel`, title: c.a.get("removeMessage") };
              return n3.push(C2("a", null, i2)), C2("li", n3).outerHTML;
            }, Oe = [".form-elements input", ".form-elements select", ".form-elements textarea"].join(", ");
            P.on("change blur keyup click", Oe, i()((e3) => {
              if (e3) {
                if ([({ type: e4, target: t3 }) => e4 === "keyup" && t3.name === "className"].some((t3) => t3(e3)))
                  return false;
                ye(r2(e3.target).closest(".form-field"));
              }
            }, m.e, { leading: false })), P.on("click touchstart", ".remove", (t3) => {
              const o3 = r2(t3.target).parents(".form-field:eq(0)"), n3 = o3[0], i2 = n3.getAttribute("type"), l2 = r2(t3.target.parentElement);
              t3.preventDefault();
              n3.querySelector(".sortable-options").childNodes.length <= 2 && !i2.includes("checkbox") ? e2.notify.error("Error: " + c.a.get("minOptionMessage")) : l2.slideUp("250", () => {
                l2.remove(), ye(o3);
              });
            }), P.on("touchstart", "input", (e3) => {
              const t3 = r2(this);
              if (e3.handled === true)
                return false;
              if (t3.attr("type") === "checkbox")
                t3.trigger("click");
              else {
                t3.focus();
                const e4 = t3.val();
                t3.val(e4);
              }
            }), P.on("click touchstart", ".toggle-form, .close-field", function(e3) {
              if (e3.stopPropagation(), e3.preventDefault(), e3.handled === true)
                return false;
              {
                const t3 = r2(e3.target).parents(".form-field:eq(0)").attr("id");
                A2.toggleEdit(t3), e3.handled = true;
              }
            }), P.on("dblclick", "li.form-field", (e3) => {
              if (!["select", "input", "label"].includes(e3.target.tagName.toLowerCase()) && e3.target.contentEditable !== "true" && (e3.stopPropagation(), e3.preventDefault(), e3.handled !== true)) {
                const t3 = e3.target.tagName == "li" ? r2(e3.target).attr("id") : r2(e3.target).closest("li.form-field").attr("id");
                A2.toggleEdit(t3), e3.handled = true;
              }
            }), P.on("change", '[name="subtype"]', (e3) => {
              const t3 = r2(e3.target).closest("li.form-field");
              r2(".value-wrap", t3).toggle(e3.target.value !== "quill");
            });
            P.on("change", [".prev-holder input", ".prev-holder select", ".prev-holder textarea"].join(", "), (e3) => {
              let t3;
              if (e3.target.classList.contains("other-option"))
                return;
              const r3 = Object(p.f)(e3.target, ".form-field");
              if (["select", "checkbox-group", "radio-group"].includes(r3.type)) {
                const o3 = r3.getElementsByClassName("option-value");
                r3.type === "select" ? Object(p.j)(o3, (t4) => {
                  o3[t4].parentElement.childNodes[0].checked = e3.target.value === o3[t4].value;
                }) : (t3 = document.getElementsByName(e3.target.name), Object(p.j)(t3, (e4) => {
                  o3[e4].parentElement.childNodes[0].checked = t3[e4].checked;
                }));
              } else {
                const t4 = document.getElementById("value-" + r3.id);
                t4 && (t4.value = e3.target.value);
              }
              A2.save.call(A2);
            }), Object(p.a)(b2.stage, "keyup change", ({ target: e3 }) => {
              if (!e3.classList.contains("fld-label"))
                return;
              const t3 = e3.value || e3.innerHTML;
              Object(p.f)(e3, ".form-field").querySelector(".field-label").innerHTML = Object(p.x)(t3);
            }), P.on("keyup", "input.error", ({ target: e3 }) => r2(e3).removeClass("error")), P.on("keyup", 'input[name="description"]', function(e3) {
              const t3 = r2(e3.target).parents(".form-field:eq(0)"), o3 = r2(".tooltip-element", t3), n3 = r2(e3.target).val();
              if (n3 !== "")
                if (o3.length)
                  o3.attr("tooltip", n3).css("display", "inline-block");
                else {
                  const e4 = `<span class="tooltip-element" tooltip="${n3}">?</span>`;
                  r2(".field-label", t3).after(e4);
                }
              else
                o3.length && o3.css("display", "none");
            }), P.on("change", ".fld-multiple", (e3) => {
              const t3 = e3.target.checked ? "checkbox" : "radio", o3 = r2(".option-selected", r2(e3.target).closest(".form-elements"));
              return o3.each((e4) => o3[e4].type = t3), t3;
            }), P.on("blur", "input.fld-name", function(e3) {
              e3.target.value = Object(p.A)(e3.target.value), e3.target.value === "" ? r2(e3.target).addClass("field-error").attr("placeholder", c.a.get("cannotBeEmpty")) : r2(e3.target).removeClass("field-error");
            }), P.on("blur", "input.fld-maxlength", (e3) => {
              e3.target.value = Object(p.k)(e3.target.value);
            }), P.on("click touchstart", ".btnAddControl", function(e3) {
              const t3 = r2(e3.currentTarget);
              z = M.clone(), z.hover(function() {
              }, function() {
                z.remove();
              }), z.on("click", "li", ({ target: e4 }) => {
                V = true, W = true, H = t3;
                const o4 = r2(e4).closest("li");
                A2.stopIndex = void 0, Y(o4), A2.save.call(A2), z.remove();
              }), P.append(z), t3.index() == 0 ? z.css({ position: "fixed", left: t3.offset().left, top: t3.offset().top - r2(window).scrollTop() }) : z.css({ position: "fixed", left: t3.offset().left - 80, top: t3.offset().top - r2(window).scrollTop() });
              const o3 = z.offset().top + z.outerHeight(), n3 = r2(window).scrollTop() + r2(window).innerHeight();
              o3 > n3 && z.css({ top: parseInt(z.css("top")) - (o3 - n3) });
            }), P.on("click touchstart", `.${w.a}copy`, function(t3) {
              t3.preventDefault();
              const o3 = r2(t3.target).parent().parent("li"), n3 = function(t4) {
                d2.lastID = A2.incrementId(d2.lastID), ge(t4);
                const o4 = t4.attr("id"), n4 = t4.attr("type"), i2 = n4 + "-" + new Date().getTime(), l2 = t4.clone();
                r2(".fld-name", l2).val(i2), l2.find("[id]").each((e3, t5) => {
                  t5.id = t5.id.replace(o4, d2.lastID);
                }), l2.find("[for]").each((e3, t5) => {
                  const r3 = t5.getAttribute("for").replace(o4, d2.lastID);
                  t5.setAttribute("for", r3);
                });
                return t4.find("select").each(function(e3) {
                  l2.find("select").eq(e3).val(r2(this).val());
                }), l2.attr("id", d2.lastID), l2.attr("name", i2), l2.addClass("cloned"), r2(".sortable-options", l2).sortable(), e2.typeUserEvents[n4] && e2.typeUserEvents[n4].onclone && e2.typeUserEvents[n4].onclone(l2[0]), l2;
              }(o3);
              !function(e3, t4) {
                if (!Q())
                  return void e3.insertAfter(t4);
                const o4 = r2("#className-" + t4.attr("id")), n4 = xe({}), i2 = C2("div", null, { id: e3.attr("id") + "-row", className: `row row-${n4.rowNumber} ${j}` }), l2 = C2("div", null, { id: e3.attr("id") + "-cont", className: `${A2.getBootstrapColumnClass(o4.val())} ${k}` });
                let a3;
                r2(l2).appendTo(i2), t4.parent().is("div") ? a3 = t4.closest(S) : t4.parent().is("ul") && (a3 = t4);
                r2(i2).insertAfter(a3), e3.appendTo(l2), he(i2), Ne(e3.attr("id"));
              }(n3, o3), ye(n3), A2.tmpCleanPrevHolder(n3.find(".prev-holder")), e2.editOnAdd && A2.closeField(d2.lastID, false);
            }), P.on("click touchstart", ".delete-confirm", (t3) => {
              t3.preventDefault();
              const o3 = t3.target.getBoundingClientRect(), n3 = document.body.getBoundingClientRect(), i2 = { pageX: o3.left + o3.width / 2, pageY: o3.top - n3.top - 12 }, l2 = r2(t3.target).parents(".form-field:eq(0)").attr("id"), a3 = r2(document.getElementById(l2));
              if (document.addEventListener("modalClosed", function() {
                a3.removeClass("deleting");
              }, false), e2.fieldRemoveWarn) {
                const e3 = C2("h3", c.a.get("warning")), t4 = C2("p", c.a.get("fieldRemoveWarning"));
                A2.confirm([e3, t4], () => A2.removeField(l2), i2), a3.addClass("deleting");
              } else
                A2.removeField(l2);
            });
            var Ce, je = false;
            let ke, qe;
            function Ee(e3, t3 = false) {
              const o3 = e3.children("div" + T).length, n3 = Math.floor(12 / o3);
              e3.children("div" + T).each((e4, o4) => {
                const i2 = r2("#" + o4.id);
                t3 || i2.find("li").attr("manuallyChangedDefaultColumnClass") != "true" ? A2.syncBootstrapColumnWrapperAndClassProperty(o4.id.replace("-cont", ""), n3) : A2.showToast(`Preserving column size of field ${e4 + 1} because you had personally adjusted it`, 4e3);
              });
            }
            function Ne(e3) {
              if (e3) {
                const t3 = r2("#className-" + e3.replace("-cont", ""));
                if (t3.val()) {
                  const e4 = A2.getRowClass(t3.val()), r3 = A2.getRowClass(t3.closest(S).attr("class"));
                  t3.val(t3.val().replace(e4, r3)), Se();
                }
              }
            }
            function Se() {
              P.find(T).each((e3, t3) => {
                const n3 = r2(t3);
                n3.is(":empty") && !o2.preserveTempContainers.includes(n3.attr("id")) && n3.remove();
              }), P.children(S).not(B).each((e3, t3) => {
                if (r2(t3).children(T).length == 0) {
                  const e4 = A2.getRowValue(r2(t3).attr("class"));
                  h2 = h2.filter((t4) => t4 != e4), r2(t3).remove();
                } else
                  ve(r2(t3));
              });
            }
            function Te() {
              return P.find("li").length > 0;
            }
            function De() {
              if (Te() || !Q())
                return;
              const e3 = xe({}), t3 = C2("div", null, { id: A2.incrementId(d2.lastID) + "-row", className: `row row-${e3.rowNumber} ${j}` });
              P.append(t3), he(t3), be(), P.find(B).eq(0).removeClass(N).css({ height: P.css("height"), backgroundColor: "transparent" });
            }
            function Be(e3 = true) {
              if (e3)
                je = true, A2.showToast("Starting Grid Mode - Use the mousewheel to resize.", 1500), M.css("display", "none"), r2(b2.formActions).css("display", "none"), we(), r2(J).html(`
    <div style='padding:5px'>    
      <h3 class="text text-center">Grid Mode</h3>    
      
      <table style='border-spacing:7px;border-collapse: separate'>
        <thead>
          <tr>
            <th>Action</th>
            <th>Result</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><kbd>MOUSEWHEEL</kbd></td>
            <td>Adjust the field column size</td>
          </tr>    
          <tr>
            <td><kbd>W or &#x2191;</kbd></td> 
            <td>Move entire row up</td>
          </tr>
          <tr>
              <td><kbd>S or &#x2193;</kbd></td> 
              <td>Move entire row down</td>
          </tr>
          <tr>
              <td><kbd>A or &#x2190;</kbd></td>
              <td>Move field left within the row</td>
          </tr>
          <tr>
              <td><kbd>D or &#x2192;</kbd></td> 
              <td>Move field right within the row</td>
          </tr>
          <tr>
            <td><kbd>R</kbd></td> 
            <td>Resize all fields within the row to be maximally equal</td>
          </tr>
          <tr>
        </tbody> 
      </table>

      <h5 class="text text-center" style='padding-top:10px'>Current Row Fields</h5>    
      
      <table class='gridHelpCurrentRow'>
        <colgroup>
          <col width="100%" />
          <col width="0%" />
        </colgroup>
        
        <thead>
          <tr>
            <th>Field</th>
            <th>Size</th>
          </tr>
        </thead>

        <tbody>
        </tbody> 
      </table>
      
    </div>
    `), Le(), A2.closeAllEdit(), A2.toggleHighlight(Ce), pe();
              else {
                A2.showToast("Grid Mode Finished", 1500);
                const e4 = Ce.closest(S);
                let t3 = 0;
                e4.children("div" + T).each((e5, o3) => {
                  const n3 = r2("#" + o3.id).find("li").attr("id");
                  t3 += A2.getBootstrapColumnValue(r2(`#${n3}-cont`).attr("class"));
                }), t3 > 12 && Ee(e4, true), je = false, Ce = null, r2(J).html(""), M.css("display", "unset"), r2(b2.formActions).css("display", "unset");
              }
            }
            function Le() {
              r2(J).find(".gridHelpCurrentRow tbody").empty();
              Ce.closest(S).children("div" + T).each((e3, t3) => {
                const o3 = r2("#" + t3.id).find("li").attr("id"), n3 = r2("#" + o3).attr("type");
                let i2 = r2("#label-" + o3).html();
                n3 != "hidden" && n3 != "paragraph" || (i2 = r2("#name-" + o3).val()), i2 || (i2 = r2("#" + o3).attr("id"));
                let l2 = "";
                Ce.attr("id") == o3 && (l2 = "currentGridModeFieldHighlight"), r2(J).find(".gridHelpCurrentRow tbody").append(`
        <tr>
          <td class='grid-mode-help-row1 ${l2}'>${i2}</td>
          <td class='grid-mode-help-row2 ${l2}'>
            ${A2.getBootstrapColumnValue(r2(`#${o3}-cont`).attr("class"))}
          </td>
        <tr>
      `);
              });
            }
            if (P.on("click touchstart", ".grid-button", (e3) => {
              e3.preventDefault();
              const t3 = r2(e3.target).parents(".form-field:eq(0)").attr("id");
              Ce = r2(document.getElementById(t3)), ke = e3.pageX, qe = e3.pageY, Be();
            }), P.bind("mousewheel", function(e3) {
              if (je) {
                e3.preventDefault();
                const t3 = Ce.closest("div"), o3 = A2.getBootstrapColumnValue(t3.attr("class"));
                let n3;
                if (n3 = e3.originalEvent.wheelDelta / 120 > 0 ? parseInt(o3) + 1 : parseInt(o3) - 1, n3 > 12)
                  return void A2.showToast('<b class="formbuilder-required">Column Size cannot exceed 12</b>');
                if (n3 < 1)
                  return void A2.showToast('<b class="formbuilder-required">Column Size cannot be less than 1</b>');
                const i2 = Ce.closest(S);
                let l2 = n3;
                if (i2.children("div" + T).each((e4, t4) => {
                  const o4 = r2("#" + t4.id).find("li").attr("id");
                  o4 != Ce.attr("id") && (l2 += A2.getBootstrapColumnValue(r2(`#${o4}-cont`).attr("class")));
                }), l2 > 12)
                  return void A2.showToast('<b class="formbuilder-required">There is a maximum of 12 columns per row</b>');
                A2.syncBootstrapColumnWrapperAndClassProperty(Ce.attr("id"), n3), Ce.attr("manuallyChangedDefaultColumnClass", true), Le(), A2.toggleHighlight(Ce);
              }
            }), r2(document).keydown((e3) => {
              if (je) {
                e3.preventDefault();
                const t3 = Ce.closest(S);
                e3.keyCode != 87 && e3.keyCode != 38 || function(e4) {
                  const t4 = e4.prevAll().not(B).first();
                  if (!t4.length)
                    return;
                  r2(Ce.parent().parent()).swapWith(t4);
                  A2.toggleHighlight(Ce);
                }(t3), e3.keyCode != 83 && e3.keyCode != 40 || function(e4) {
                  const t4 = e4.nextAll().not(L).first();
                  if (!t4.length)
                    return;
                  r2(Ce.parent().parent()).swapWith(t4);
                  A2.toggleHighlight(Ce);
                }(t3), e3.keyCode != 65 && e3.keyCode != 37 || function() {
                  const e4 = Ce.parent().prev();
                  e4.length && Ce.parent().after(e4);
                  A2.toggleHighlight(Ce);
                }(), e3.keyCode != 68 && e3.keyCode != 39 || function() {
                  const e4 = Ce.parent().next();
                  e4.length && Ce.parent().before(e4);
                  A2.toggleHighlight(Ce);
                }(), e3.keyCode == 82 && Ee(t3, true), Le(), ve(t3);
              }
            }), r2(document).mousemove((e3) => {
              je && A2.getDistanceBetweenPoints(ke, qe, e3.pageX, e3.pageY) > m.a.opts.cancelGridModeDistance && Be(false);
            }), r2(document).on("checkRowCleanup", (e3, t3) => {
              Se();
              const o3 = r2("#" + t3.rowWrapperID);
              o3.length && Ee(o3, true), De();
            }), r2(document).on("fieldOpened", (e3, t3) => {
              const o3 = r2("#" + t3.rowWrapperID);
              o3.length && ve(o3);
            }), P.on("click", ".style-wrap button", (e3) => {
              const t3 = r2(e3.target), o3 = t3.closest(".form-elements"), n3 = t3.val(), i2 = r2(".btn-style", o3);
              i2.val(n3), t3.siblings(".btn").removeClass("selected"), t3.addClass("selected"), ye(i2.closest(".form-field"));
            }), P.on("click", ".fld-required", (e3) => {
              r2(e3.target).closest(".form-field").find(".required-asterisk").toggle();
            }), P.on("click", "input.fld-access", function(e3) {
              const t3 = r2(e3.target).closest(".form-field").find(".available-roles"), o3 = r2(e3.target);
              t3.slideToggle(250, function() {
                o3.is(":checked") || r2("input[type=checkbox]", t3).removeAttr("checked");
              });
            }), P.on("click", ".add-opt", function(e3) {
              e3.preventDefault();
              const t3 = r2(e3.target).closest(".form-field").attr("type"), o3 = r2(e3.target).closest(".field-options"), n3 = r2('[name="multiple"]', o3), i2 = r2(".option-selected:eq(0)", o3);
              let l2 = false;
              l2 = n3.length ? n3.prop("checked") : i2.attr("type") === "checkbox";
              const a3 = r2(".sortable-options", o3), s2 = m.a.opts.onAddOption({ selected: false, label: "", value: "" }, { type: t3, index: a3.children().length, isMultiple: l2 });
              a3.append(Ae(s2, l2));
            }), P.on("mouseover mouseout", ".remove, .del-button", (e3) => r2(e3.target).closest("li").toggleClass("delete")), K(), e2.disableInjectedStyle) {
              const e3 = document.getElementsByClassName("formBuilder-injected-style");
              Object(p.j)(e3, (t3) => Object(l.f)(e3[t3]));
            }
            return document.dispatchEvent(u.a.loaded), o2.actions = { getFieldTypes: (t3) => t3 ? Object(p.B)(I2.getRegistered(), e2.disableFields) : I2.getRegistered(), clearFields: (e3) => A2.removeAllFields(b2.stage, e3), showData: A2.showData.bind(A2), save: (e3) => {
              const t3 = A2.save(e3), r3 = window.JSON.parse(t3);
              return m.a.opts.onSave(r3), r3;
            }, addField: (e3, t3) => {
              A2.stopIndex = d2.formData.length ? t3 : void 0, Z(e3);
            }, removeField: A2.removeField.bind(A2), getData: A2.getFormData.bind(A2), setData: (e3) => {
              A2.stopIndex = void 0, A2.removeAllFields(b2.stage, false), K(e3);
            }, setLang: (e3) => {
              c.a.setCurrent.call(c.a, e3).then(() => {
                b2.stage.dataset.content = c.a.get("getStarted"), I2.init(), b2.empty(b2.formActions), A2.formActionButtons().forEach((e4) => b2.formActions.appendChild(e4));
              });
            }, showDialog: A2.dialog.bind(A2), toggleFieldEdit: (e3) => {
              (Array.isArray(e3) ? e3 : [e3]).forEach((e4) => {
                ["number", "string"].includes(typeof e4) && (typeof e4 == "number" ? e4 = b2.stage.children[e4].id : /^frmb-/.test(e4) || (e4 = b2.stage.querySelector(e4).id), A2.toggleEdit(e4));
              });
            }, toggleAllFieldEdit: () => {
              Object(p.j)(b2.stage.children, (e3) => {
                A2.toggleEdit(b2.stage.children[e3].id);
              });
            }, closeAllFieldEdit: A2.closeAllEdit.bind(A2), getCurrentFieldId: () => d2.lastID }, b2.onRender(b2.controls, () => {
              const t3 = setTimeout(() => {
                b2.stage.style.minHeight = b2.controls.clientHeight + "px", e2.stickyControls.enable && A2.stickyControls(P), De(), clearTimeout(t3);
              }, 0);
            }), o2;
          }
          const F = { init: (e2, t2) => {
            const r2 = jQuery.extend({}, m.d, e2, true), { i18n: o2 } = r2, n2 = x(r2, ["i18n"]);
            m.a.opts = n2;
            const i2 = jQuery.extend({}, m.c, o2, true);
            return F.instance = { actions: { getFieldTypes: null, addField: null, clearFields: null, closeAllFieldEdit: null, getData: null, removeField: null, save: null, setData: null, setLang: null, showData: null, showDialog: null, toggleAllFieldEdit: null, toggleFieldEdit: null, getCurrentFieldId: null }, markup: p.t, get formData() {
              return F.instance.actions.getData && F.instance.actions.getData("json");
            }, promise: new Promise(function(e3, r3) {
              c.a.init(i2).then(() => {
                t2.each((e4) => {
                  const r4 = new I(n2, t2[e4], jQuery);
                  jQuery(t2[e4]).data("formBuilder", r4), Object.assign(F, r4.actions, { markup: p.t }), F.instance.actions = r4.actions;
                }), delete F.instance.promise, e3(F.instance);
              }).catch((e4) => {
                r3(e4), n2.notify.error(e4);
              });
            }) }, F.instance;
          } };
          jQuery.fn.formBuilder = function(e2 = {}, ...t2) {
            if (!(typeof e2 == "string")) {
              const t3 = F.init(e2, this);
              return Object.assign(F, t3), t3;
            }
            if (F[e2])
              return typeof F[e2] == "function" ? F[e2].apply(this, t2) : F[e2];
          };
        }]);
      }(jQuery);
    }
  });

  // src/js/jquery.js
  var import_jquery = __toESM(require_jquery());
  window.jQuery = import_jquery.default;
  window.$ = import_jquery.default;

  // webpack/app.jsx
  var import_jquery_validation = __toESM(require_jquery_validate());

  // node_modules/jquery-ui-sortable/jquery-ui.min.js
  (function(t) {
    typeof define == "function" && define.amd ? define(["jquery"], t) : t(jQuery);
  })(function(t) {
    t.ui = t.ui || {}, t.ui.version = "1.12.0";
    var e = 0, i = Array.prototype.slice;
    t.cleanData = function(e2) {
      return function(i2) {
        var s2, n, o;
        for (o = 0; (n = i2[o]) != null; o++)
          try {
            s2 = t._data(n, "events"), s2 && s2.remove && t(n).triggerHandler("remove");
          } catch (a) {
          }
        e2(i2);
      };
    }(t.cleanData), t.widget = function(e2, i2, s2) {
      var n, o, a, r = {}, l = e2.split(".")[0];
      e2 = e2.split(".")[1];
      var h = l + "-" + e2;
      return s2 || (s2 = i2, i2 = t.Widget), t.isArray(s2) && (s2 = t.extend.apply(null, [{}].concat(s2))), t.expr[":"][h.toLowerCase()] = function(e3) {
        return !!t.data(e3, h);
      }, t[l] = t[l] || {}, n = t[l][e2], o = t[l][e2] = function(t2, e3) {
        return this._createWidget ? (arguments.length && this._createWidget(t2, e3), void 0) : new o(t2, e3);
      }, t.extend(o, n, { version: s2.version, _proto: t.extend({}, s2), _childConstructors: [] }), a = new i2(), a.options = t.widget.extend({}, a.options), t.each(s2, function(e3, s3) {
        return t.isFunction(s3) ? (r[e3] = function() {
          function t2() {
            return i2.prototype[e3].apply(this, arguments);
          }
          function n2(t3) {
            return i2.prototype[e3].apply(this, t3);
          }
          return function() {
            var e4, i3 = this._super, o2 = this._superApply;
            return this._super = t2, this._superApply = n2, e4 = s3.apply(this, arguments), this._super = i3, this._superApply = o2, e4;
          };
        }(), void 0) : (r[e3] = s3, void 0);
      }), o.prototype = t.widget.extend(a, { widgetEventPrefix: n ? a.widgetEventPrefix || e2 : e2 }, r, { constructor: o, namespace: l, widgetName: e2, widgetFullName: h }), n ? (t.each(n._childConstructors, function(e3, i3) {
        var s3 = i3.prototype;
        t.widget(s3.namespace + "." + s3.widgetName, o, i3._proto);
      }), delete n._childConstructors) : i2._childConstructors.push(o), t.widget.bridge(e2, o), o;
    }, t.widget.extend = function(e2) {
      for (var s2, n, o = i.call(arguments, 1), a = 0, r = o.length; r > a; a++)
        for (s2 in o[a])
          n = o[a][s2], o[a].hasOwnProperty(s2) && n !== void 0 && (e2[s2] = t.isPlainObject(n) ? t.isPlainObject(e2[s2]) ? t.widget.extend({}, e2[s2], n) : t.widget.extend({}, n) : n);
      return e2;
    }, t.widget.bridge = function(e2, s2) {
      var n = s2.prototype.widgetFullName || e2;
      t.fn[e2] = function(o) {
        var a = typeof o == "string", r = i.call(arguments, 1), l = this;
        return a ? this.each(function() {
          var i2, s3 = t.data(this, n);
          return o === "instance" ? (l = s3, false) : s3 ? t.isFunction(s3[o]) && o.charAt(0) !== "_" ? (i2 = s3[o].apply(s3, r), i2 !== s3 && i2 !== void 0 ? (l = i2 && i2.jquery ? l.pushStack(i2.get()) : i2, false) : void 0) : t.error("no such method '" + o + "' for " + e2 + " widget instance") : t.error("cannot call methods on " + e2 + " prior to initialization; attempted to call method '" + o + "'");
        }) : (r.length && (o = t.widget.extend.apply(null, [o].concat(r))), this.each(function() {
          var e3 = t.data(this, n);
          e3 ? (e3.option(o || {}), e3._init && e3._init()) : t.data(this, n, new s2(o, this));
        })), l;
      };
    }, t.Widget = function() {
    }, t.Widget._childConstructors = [], t.Widget.prototype = { widgetName: "widget", widgetEventPrefix: "", defaultElement: "<div>", options: { classes: {}, disabled: false, create: null }, _createWidget: function(i2, s2) {
      s2 = t(s2 || this.defaultElement || this)[0], this.element = t(s2), this.uuid = e++, this.eventNamespace = "." + this.widgetName + this.uuid, this.bindings = t(), this.hoverable = t(), this.focusable = t(), this.classesElementLookup = {}, s2 !== this && (t.data(s2, this.widgetFullName, this), this._on(true, this.element, { remove: function(t2) {
        t2.target === s2 && this.destroy();
      } }), this.document = t(s2.style ? s2.ownerDocument : s2.document || s2), this.window = t(this.document[0].defaultView || this.document[0].parentWindow)), this.options = t.widget.extend({}, this.options, this._getCreateOptions(), i2), this._create(), this.options.disabled && this._setOptionDisabled(this.options.disabled), this._trigger("create", null, this._getCreateEventData()), this._init();
    }, _getCreateOptions: function() {
      return {};
    }, _getCreateEventData: t.noop, _create: t.noop, _init: t.noop, destroy: function() {
      var e2 = this;
      this._destroy(), t.each(this.classesElementLookup, function(t2, i2) {
        e2._removeClass(i2, t2);
      }), this.element.off(this.eventNamespace).removeData(this.widgetFullName), this.widget().off(this.eventNamespace).removeAttr("aria-disabled"), this.bindings.off(this.eventNamespace);
    }, _destroy: t.noop, widget: function() {
      return this.element;
    }, option: function(e2, i2) {
      var s2, n, o, a = e2;
      if (arguments.length === 0)
        return t.widget.extend({}, this.options);
      if (typeof e2 == "string")
        if (a = {}, s2 = e2.split("."), e2 = s2.shift(), s2.length) {
          for (n = a[e2] = t.widget.extend({}, this.options[e2]), o = 0; s2.length - 1 > o; o++)
            n[s2[o]] = n[s2[o]] || {}, n = n[s2[o]];
          if (e2 = s2.pop(), arguments.length === 1)
            return n[e2] === void 0 ? null : n[e2];
          n[e2] = i2;
        } else {
          if (arguments.length === 1)
            return this.options[e2] === void 0 ? null : this.options[e2];
          a[e2] = i2;
        }
      return this._setOptions(a), this;
    }, _setOptions: function(t2) {
      var e2;
      for (e2 in t2)
        this._setOption(e2, t2[e2]);
      return this;
    }, _setOption: function(t2, e2) {
      return t2 === "classes" && this._setOptionClasses(e2), this.options[t2] = e2, t2 === "disabled" && this._setOptionDisabled(e2), this;
    }, _setOptionClasses: function(e2) {
      var i2, s2, n;
      for (i2 in e2)
        n = this.classesElementLookup[i2], e2[i2] !== this.options.classes[i2] && n && n.length && (s2 = t(n.get()), this._removeClass(n, i2), s2.addClass(this._classes({ element: s2, keys: i2, classes: e2, add: true })));
    }, _setOptionDisabled: function(t2) {
      this._toggleClass(this.widget(), this.widgetFullName + "-disabled", null, !!t2), t2 && (this._removeClass(this.hoverable, null, "ui-state-hover"), this._removeClass(this.focusable, null, "ui-state-focus"));
    }, enable: function() {
      return this._setOptions({ disabled: false });
    }, disable: function() {
      return this._setOptions({ disabled: true });
    }, _classes: function(e2) {
      function i2(i3, o) {
        var a, r;
        for (r = 0; i3.length > r; r++)
          a = n.classesElementLookup[i3[r]] || t(), a = e2.add ? t(t.unique(a.get().concat(e2.element.get()))) : t(a.not(e2.element).get()), n.classesElementLookup[i3[r]] = a, s2.push(i3[r]), o && e2.classes[i3[r]] && s2.push(e2.classes[i3[r]]);
      }
      var s2 = [], n = this;
      return e2 = t.extend({ element: this.element, classes: this.options.classes || {} }, e2), e2.keys && i2(e2.keys.match(/\S+/g) || [], true), e2.extra && i2(e2.extra.match(/\S+/g) || []), s2.join(" ");
    }, _removeClass: function(t2, e2, i2) {
      return this._toggleClass(t2, e2, i2, false);
    }, _addClass: function(t2, e2, i2) {
      return this._toggleClass(t2, e2, i2, true);
    }, _toggleClass: function(t2, e2, i2, s2) {
      s2 = typeof s2 == "boolean" ? s2 : i2;
      var n = typeof t2 == "string" || t2 === null, o = { extra: n ? e2 : i2, keys: n ? t2 : e2, element: n ? this.element : t2, add: s2 };
      return o.element.toggleClass(this._classes(o), s2), this;
    }, _on: function(e2, i2, s2) {
      var n, o = this;
      typeof e2 != "boolean" && (s2 = i2, i2 = e2, e2 = false), s2 ? (i2 = n = t(i2), this.bindings = this.bindings.add(i2)) : (s2 = i2, i2 = this.element, n = this.widget()), t.each(s2, function(s3, a) {
        function r() {
          return e2 || o.options.disabled !== true && !t(this).hasClass("ui-state-disabled") ? (typeof a == "string" ? o[a] : a).apply(o, arguments) : void 0;
        }
        typeof a != "string" && (r.guid = a.guid = a.guid || r.guid || t.guid++);
        var l = s3.match(/^([\w:-]*)\s*(.*)$/), h = l[1] + o.eventNamespace, c = l[2];
        c ? n.on(h, c, r) : i2.on(h, r);
      });
    }, _off: function(e2, i2) {
      i2 = (i2 || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, e2.off(i2).off(i2), this.bindings = t(this.bindings.not(e2).get()), this.focusable = t(this.focusable.not(e2).get()), this.hoverable = t(this.hoverable.not(e2).get());
    }, _delay: function(t2, e2) {
      function i2() {
        return (typeof t2 == "string" ? s2[t2] : t2).apply(s2, arguments);
      }
      var s2 = this;
      return setTimeout(i2, e2 || 0);
    }, _hoverable: function(e2) {
      this.hoverable = this.hoverable.add(e2), this._on(e2, { mouseenter: function(e3) {
        this._addClass(t(e3.currentTarget), null, "ui-state-hover");
      }, mouseleave: function(e3) {
        this._removeClass(t(e3.currentTarget), null, "ui-state-hover");
      } });
    }, _focusable: function(e2) {
      this.focusable = this.focusable.add(e2), this._on(e2, { focusin: function(e3) {
        this._addClass(t(e3.currentTarget), null, "ui-state-focus");
      }, focusout: function(e3) {
        this._removeClass(t(e3.currentTarget), null, "ui-state-focus");
      } });
    }, _trigger: function(e2, i2, s2) {
      var n, o, a = this.options[e2];
      if (s2 = s2 || {}, i2 = t.Event(i2), i2.type = (e2 === this.widgetEventPrefix ? e2 : this.widgetEventPrefix + e2).toLowerCase(), i2.target = this.element[0], o = i2.originalEvent)
        for (n in o)
          n in i2 || (i2[n] = o[n]);
      return this.element.trigger(i2, s2), !(t.isFunction(a) && a.apply(this.element[0], [i2].concat(s2)) === false || i2.isDefaultPrevented());
    } }, t.each({ show: "fadeIn", hide: "fadeOut" }, function(e2, i2) {
      t.Widget.prototype["_" + e2] = function(s2, n, o) {
        typeof n == "string" && (n = { effect: n });
        var a, r = n ? n === true || typeof n == "number" ? i2 : n.effect || i2 : e2;
        n = n || {}, typeof n == "number" && (n = { duration: n }), a = !t.isEmptyObject(n), n.complete = o, n.delay && s2.delay(n.delay), a && t.effects && t.effects.effect[r] ? s2[e2](n) : r !== e2 && s2[r] ? s2[r](n.duration, n.easing, o) : s2.queue(function(i3) {
          t(this)[e2](), o && o.call(s2[0]), i3();
        });
      };
    }), t.widget, t.extend(t.expr[":"], { data: t.expr.createPseudo ? t.expr.createPseudo(function(e2) {
      return function(i2) {
        return !!t.data(i2, e2);
      };
    }) : function(e2, i2, s2) {
      return !!t.data(e2, s2[3]);
    } }), t.fn.scrollParent = function(e2) {
      var i2 = this.css("position"), s2 = i2 === "absolute", n = e2 ? /(auto|scroll|hidden)/ : /(auto|scroll)/, o = this.parents().filter(function() {
        var e3 = t(this);
        return s2 && e3.css("position") === "static" ? false : n.test(e3.css("overflow") + e3.css("overflow-y") + e3.css("overflow-x"));
      }).eq(0);
      return i2 !== "fixed" && o.length ? o : t(this[0].ownerDocument || document);
    }, t.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase());
    var s = false;
    t(document).on("mouseup", function() {
      s = false;
    }), t.widget("ui.mouse", { version: "1.12.0", options: { cancel: "input, textarea, button, select, option", distance: 1, delay: 0 }, _mouseInit: function() {
      var e2 = this;
      this.element.on("mousedown." + this.widgetName, function(t2) {
        return e2._mouseDown(t2);
      }).on("click." + this.widgetName, function(i2) {
        return t.data(i2.target, e2.widgetName + ".preventClickEvent") === true ? (t.removeData(i2.target, e2.widgetName + ".preventClickEvent"), i2.stopImmediatePropagation(), false) : void 0;
      }), this.started = false;
    }, _mouseDestroy: function() {
      this.element.off("." + this.widgetName), this._mouseMoveDelegate && this.document.off("mousemove." + this.widgetName, this._mouseMoveDelegate).off("mouseup." + this.widgetName, this._mouseUpDelegate);
    }, _mouseDown: function(e2) {
      if (!s) {
        this._mouseMoved = false, this._mouseStarted && this._mouseUp(e2), this._mouseDownEvent = e2;
        var i2 = this, n = e2.which === 1, o = typeof this.options.cancel == "string" && e2.target.nodeName ? t(e2.target).closest(this.options.cancel).length : false;
        return n && !o && this._mouseCapture(e2) ? (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function() {
          i2.mouseDelayMet = true;
        }, this.options.delay)), this._mouseDistanceMet(e2) && this._mouseDelayMet(e2) && (this._mouseStarted = this._mouseStart(e2) !== false, !this._mouseStarted) ? (e2.preventDefault(), true) : (t.data(e2.target, this.widgetName + ".preventClickEvent") === true && t.removeData(e2.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function(t2) {
          return i2._mouseMove(t2);
        }, this._mouseUpDelegate = function(t2) {
          return i2._mouseUp(t2);
        }, this.document.on("mousemove." + this.widgetName, this._mouseMoveDelegate).on("mouseup." + this.widgetName, this._mouseUpDelegate), e2.preventDefault(), s = true, true)) : true;
      }
    }, _mouseMove: function(e2) {
      if (this._mouseMoved) {
        if (t.ui.ie && (!document.documentMode || 9 > document.documentMode) && !e2.button)
          return this._mouseUp(e2);
        if (!e2.which) {
          if (e2.originalEvent.altKey || e2.originalEvent.ctrlKey || e2.originalEvent.metaKey || e2.originalEvent.shiftKey)
            this.ignoreMissingWhich = true;
          else if (!this.ignoreMissingWhich)
            return this._mouseUp(e2);
        }
      }
      return (e2.which || e2.button) && (this._mouseMoved = true), this._mouseStarted ? (this._mouseDrag(e2), e2.preventDefault()) : (this._mouseDistanceMet(e2) && this._mouseDelayMet(e2) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, e2) !== false, this._mouseStarted ? this._mouseDrag(e2) : this._mouseUp(e2)), !this._mouseStarted);
    }, _mouseUp: function(e2) {
      this.document.off("mousemove." + this.widgetName, this._mouseMoveDelegate).off("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = false, e2.target === this._mouseDownEvent.target && t.data(e2.target, this.widgetName + ".preventClickEvent", true), this._mouseStop(e2)), this._mouseDelayTimer && (clearTimeout(this._mouseDelayTimer), delete this._mouseDelayTimer), this.ignoreMissingWhich = false, s = false, e2.preventDefault();
    }, _mouseDistanceMet: function(t2) {
      return Math.max(Math.abs(this._mouseDownEvent.pageX - t2.pageX), Math.abs(this._mouseDownEvent.pageY - t2.pageY)) >= this.options.distance;
    }, _mouseDelayMet: function() {
      return this.mouseDelayMet;
    }, _mouseStart: function() {
    }, _mouseDrag: function() {
    }, _mouseStop: function() {
    }, _mouseCapture: function() {
      return true;
    } }), t.widget("ui.sortable", t.ui.mouse, { version: "1.12.0", widgetEventPrefix: "sort", ready: false, options: { appendTo: "parent", axis: false, connectWith: false, containment: false, cursor: "auto", cursorAt: false, dropOnEmpty: true, forcePlaceholderSize: false, forceHelperSize: false, grid: false, handle: false, helper: "original", items: "> *", opacity: false, placeholder: false, revert: false, scroll: true, scrollSensitivity: 20, scrollSpeed: 20, scope: "default", tolerance: "intersect", zIndex: 1e3, activate: null, beforeStop: null, change: null, deactivate: null, out: null, over: null, receive: null, remove: null, sort: null, start: null, stop: null, update: null }, _isOverAxis: function(t2, e2, i2) {
      return t2 >= e2 && e2 + i2 > t2;
    }, _isFloating: function(t2) {
      return /left|right/.test(t2.css("float")) || /inline|table-cell/.test(t2.css("display"));
    }, _create: function() {
      this.containerCache = {}, this._addClass("ui-sortable"), this.refresh(), this.offset = this.element.offset(), this._mouseInit(), this._setHandleClassName(), this.ready = true;
    }, _setOption: function(t2, e2) {
      this._super(t2, e2), t2 === "handle" && this._setHandleClassName();
    }, _setHandleClassName: function() {
      var e2 = this;
      this._removeClass(this.element.find(".ui-sortable-handle"), "ui-sortable-handle"), t.each(this.items, function() {
        e2._addClass(this.instance.options.handle ? this.item.find(this.instance.options.handle) : this.item, "ui-sortable-handle");
      });
    }, _destroy: function() {
      this._mouseDestroy();
      for (var t2 = this.items.length - 1; t2 >= 0; t2--)
        this.items[t2].item.removeData(this.widgetName + "-item");
      return this;
    }, _mouseCapture: function(e2, i2) {
      var s2 = null, n = false, o = this;
      return this.reverting ? false : this.options.disabled || this.options.type === "static" ? false : (this._refreshItems(e2), t(e2.target).parents().each(function() {
        return t.data(this, o.widgetName + "-item") === o ? (s2 = t(this), false) : void 0;
      }), t.data(e2.target, o.widgetName + "-item") === o && (s2 = t(e2.target)), s2 ? !this.options.handle || i2 || (t(this.options.handle, s2).find("*").addBack().each(function() {
        this === e2.target && (n = true);
      }), n) ? (this.currentItem = s2, this._removeCurrentsFromItems(), true) : false : false);
    }, _mouseStart: function(e2, i2, s2) {
      var n, o, a = this.options;
      if (this.currentContainer = this, this.refreshPositions(), this.helper = this._createHelper(e2), this._cacheHelperProportions(), this._cacheMargins(), this.scrollParent = this.helper.scrollParent(), this.offset = this.currentItem.offset(), this.offset = { top: this.offset.top - this.margins.top, left: this.offset.left - this.margins.left }, t.extend(this.offset, { click: { left: e2.pageX - this.offset.left, top: e2.pageY - this.offset.top }, parent: this._getParentOffset(), relative: this._getRelativeOffset() }), this.helper.css("position", "absolute"), this.cssPosition = this.helper.css("position"), this.originalPosition = this._generatePosition(e2), this.originalPageX = e2.pageX, this.originalPageY = e2.pageY, a.cursorAt && this._adjustOffsetFromHelper(a.cursorAt), this.domPosition = { prev: this.currentItem.prev()[0], parent: this.currentItem.parent()[0] }, this.helper[0] !== this.currentItem[0] && this.currentItem.hide(), this._createPlaceholder(), a.containment && this._setContainment(), a.cursor && a.cursor !== "auto" && (o = this.document.find("body"), this.storedCursor = o.css("cursor"), o.css("cursor", a.cursor), this.storedStylesheet = t("<style>*{ cursor: " + a.cursor + " !important; }</style>").appendTo(o)), a.opacity && (this.helper.css("opacity") && (this._storedOpacity = this.helper.css("opacity")), this.helper.css("opacity", a.opacity)), a.zIndex && (this.helper.css("zIndex") && (this._storedZIndex = this.helper.css("zIndex")), this.helper.css("zIndex", a.zIndex)), this.scrollParent[0] !== this.document[0] && this.scrollParent[0].tagName !== "HTML" && (this.overflowOffset = this.scrollParent.offset()), this._trigger("start", e2, this._uiHash()), this._preserveHelperProportions || this._cacheHelperProportions(), !s2)
        for (n = this.containers.length - 1; n >= 0; n--)
          this.containers[n]._trigger("activate", e2, this._uiHash(this));
      return t.ui.ddmanager && (t.ui.ddmanager.current = this), t.ui.ddmanager && !a.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e2), this.dragging = true, this._addClass(this.helper, "ui-sortable-helper"), this._mouseDrag(e2), true;
    }, _mouseDrag: function(e2) {
      var i2, s2, n, o, a = this.options, r = false;
      for (this.position = this._generatePosition(e2), this.positionAbs = this._convertPositionTo("absolute"), this.lastPositionAbs || (this.lastPositionAbs = this.positionAbs), this.options.scroll && (this.scrollParent[0] !== this.document[0] && this.scrollParent[0].tagName !== "HTML" ? (this.overflowOffset.top + this.scrollParent[0].offsetHeight - e2.pageY < a.scrollSensitivity ? this.scrollParent[0].scrollTop = r = this.scrollParent[0].scrollTop + a.scrollSpeed : e2.pageY - this.overflowOffset.top < a.scrollSensitivity && (this.scrollParent[0].scrollTop = r = this.scrollParent[0].scrollTop - a.scrollSpeed), this.overflowOffset.left + this.scrollParent[0].offsetWidth - e2.pageX < a.scrollSensitivity ? this.scrollParent[0].scrollLeft = r = this.scrollParent[0].scrollLeft + a.scrollSpeed : e2.pageX - this.overflowOffset.left < a.scrollSensitivity && (this.scrollParent[0].scrollLeft = r = this.scrollParent[0].scrollLeft - a.scrollSpeed)) : (e2.pageY - this.document.scrollTop() < a.scrollSensitivity ? r = this.document.scrollTop(this.document.scrollTop() - a.scrollSpeed) : this.window.height() - (e2.pageY - this.document.scrollTop()) < a.scrollSensitivity && (r = this.document.scrollTop(this.document.scrollTop() + a.scrollSpeed)), e2.pageX - this.document.scrollLeft() < a.scrollSensitivity ? r = this.document.scrollLeft(this.document.scrollLeft() - a.scrollSpeed) : this.window.width() - (e2.pageX - this.document.scrollLeft()) < a.scrollSensitivity && (r = this.document.scrollLeft(this.document.scrollLeft() + a.scrollSpeed))), r !== false && t.ui.ddmanager && !a.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e2)), this.positionAbs = this._convertPositionTo("absolute"), this.options.axis && this.options.axis === "y" || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && this.options.axis === "x" || (this.helper[0].style.top = this.position.top + "px"), i2 = this.items.length - 1; i2 >= 0; i2--)
        if (s2 = this.items[i2], n = s2.item[0], o = this._intersectsWithPointer(s2), o && s2.instance === this.currentContainer && n !== this.currentItem[0] && this.placeholder[o === 1 ? "next" : "prev"]()[0] !== n && !t.contains(this.placeholder[0], n) && (this.options.type === "semi-dynamic" ? !t.contains(this.element[0], n) : true)) {
          if (this.direction = o === 1 ? "down" : "up", this.options.tolerance !== "pointer" && !this._intersectsWithSides(s2))
            break;
          this._rearrange(e2, s2), this._trigger("change", e2, this._uiHash());
          break;
        }
      return this._contactContainers(e2), t.ui.ddmanager && t.ui.ddmanager.drag(this, e2), this._trigger("sort", e2, this._uiHash()), this.lastPositionAbs = this.positionAbs, false;
    }, _mouseStop: function(e2, i2) {
      if (e2) {
        if (t.ui.ddmanager && !this.options.dropBehaviour && t.ui.ddmanager.drop(this, e2), this.options.revert) {
          var s2 = this, n = this.placeholder.offset(), o = this.options.axis, a = {};
          o && o !== "x" || (a.left = n.left - this.offset.parent.left - this.margins.left + (this.offsetParent[0] === this.document[0].body ? 0 : this.offsetParent[0].scrollLeft)), o && o !== "y" || (a.top = n.top - this.offset.parent.top - this.margins.top + (this.offsetParent[0] === this.document[0].body ? 0 : this.offsetParent[0].scrollTop)), this.reverting = true, t(this.helper).animate(a, parseInt(this.options.revert, 10) || 500, function() {
            s2._clear(e2);
          });
        } else
          this._clear(e2, i2);
        return false;
      }
    }, cancel: function() {
      if (this.dragging) {
        this._mouseUp({ target: null }), this.options.helper === "original" ? (this.currentItem.css(this._storedCSS), this._removeClass(this.currentItem, "ui-sortable-helper")) : this.currentItem.show();
        for (var e2 = this.containers.length - 1; e2 >= 0; e2--)
          this.containers[e2]._trigger("deactivate", null, this._uiHash(this)), this.containers[e2].containerCache.over && (this.containers[e2]._trigger("out", null, this._uiHash(this)), this.containers[e2].containerCache.over = 0);
      }
      return this.placeholder && (this.placeholder[0].parentNode && this.placeholder[0].parentNode.removeChild(this.placeholder[0]), this.options.helper !== "original" && this.helper && this.helper[0].parentNode && this.helper.remove(), t.extend(this, { helper: null, dragging: false, reverting: false, _noFinalSort: null }), this.domPosition.prev ? t(this.domPosition.prev).after(this.currentItem) : t(this.domPosition.parent).prepend(this.currentItem)), this;
    }, serialize: function(e2) {
      var i2 = this._getItemsAsjQuery(e2 && e2.connected), s2 = [];
      return e2 = e2 || {}, t(i2).each(function() {
        var i3 = (t(e2.item || this).attr(e2.attribute || "id") || "").match(e2.expression || /(.+)[\-=_](.+)/);
        i3 && s2.push((e2.key || i3[1] + "[]") + "=" + (e2.key && e2.expression ? i3[1] : i3[2]));
      }), !s2.length && e2.key && s2.push(e2.key + "="), s2.join("&");
    }, toArray: function(e2) {
      var i2 = this._getItemsAsjQuery(e2 && e2.connected), s2 = [];
      return e2 = e2 || {}, i2.each(function() {
        s2.push(t(e2.item || this).attr(e2.attribute || "id") || "");
      }), s2;
    }, _intersectsWith: function(t2) {
      var e2 = this.positionAbs.left, i2 = e2 + this.helperProportions.width, s2 = this.positionAbs.top, n = s2 + this.helperProportions.height, o = t2.left, a = o + t2.width, r = t2.top, l = r + t2.height, h = this.offset.click.top, c = this.offset.click.left, u = this.options.axis === "x" || s2 + h > r && l > s2 + h, d = this.options.axis === "y" || e2 + c > o && a > e2 + c, p = u && d;
      return this.options.tolerance === "pointer" || this.options.forcePointerForContainers || this.options.tolerance !== "pointer" && this.helperProportions[this.floating ? "width" : "height"] > t2[this.floating ? "width" : "height"] ? p : e2 + this.helperProportions.width / 2 > o && a > i2 - this.helperProportions.width / 2 && s2 + this.helperProportions.height / 2 > r && l > n - this.helperProportions.height / 2;
    }, _intersectsWithPointer: function(t2) {
      var e2, i2, s2 = this.options.axis === "x" || this._isOverAxis(this.positionAbs.top + this.offset.click.top, t2.top, t2.height), n = this.options.axis === "y" || this._isOverAxis(this.positionAbs.left + this.offset.click.left, t2.left, t2.width), o = s2 && n;
      return o ? (e2 = this._getDragVerticalDirection(), i2 = this._getDragHorizontalDirection(), this.floating ? i2 === "right" || e2 === "down" ? 2 : 1 : e2 && (e2 === "down" ? 2 : 1)) : false;
    }, _intersectsWithSides: function(t2) {
      var e2 = this._isOverAxis(this.positionAbs.top + this.offset.click.top, t2.top + t2.height / 2, t2.height), i2 = this._isOverAxis(this.positionAbs.left + this.offset.click.left, t2.left + t2.width / 2, t2.width), s2 = this._getDragVerticalDirection(), n = this._getDragHorizontalDirection();
      return this.floating && n ? n === "right" && i2 || n === "left" && !i2 : s2 && (s2 === "down" && e2 || s2 === "up" && !e2);
    }, _getDragVerticalDirection: function() {
      var t2 = this.positionAbs.top - this.lastPositionAbs.top;
      return t2 !== 0 && (t2 > 0 ? "down" : "up");
    }, _getDragHorizontalDirection: function() {
      var t2 = this.positionAbs.left - this.lastPositionAbs.left;
      return t2 !== 0 && (t2 > 0 ? "right" : "left");
    }, refresh: function(t2) {
      return this._refreshItems(t2), this._setHandleClassName(), this.refreshPositions(), this;
    }, _connectWith: function() {
      var t2 = this.options;
      return t2.connectWith.constructor === String ? [t2.connectWith] : t2.connectWith;
    }, _getItemsAsjQuery: function(e2) {
      function i2() {
        r.push(this);
      }
      var s2, n, o, a, r = [], l = [], h = this._connectWith();
      if (h && e2)
        for (s2 = h.length - 1; s2 >= 0; s2--)
          for (o = t(h[s2], this.document[0]), n = o.length - 1; n >= 0; n--)
            a = t.data(o[n], this.widgetFullName), a && a !== this && !a.options.disabled && l.push([t.isFunction(a.options.items) ? a.options.items.call(a.element) : t(a.options.items, a.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), a]);
      for (l.push([t.isFunction(this.options.items) ? this.options.items.call(this.element, null, { options: this.options, item: this.currentItem }) : t(this.options.items, this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), this]), s2 = l.length - 1; s2 >= 0; s2--)
        l[s2][0].each(i2);
      return t(r);
    }, _removeCurrentsFromItems: function() {
      var e2 = this.currentItem.find(":data(" + this.widgetName + "-item)");
      this.items = t.grep(this.items, function(t2) {
        for (var i2 = 0; e2.length > i2; i2++)
          if (e2[i2] === t2.item[0])
            return false;
        return true;
      });
    }, _refreshItems: function(e2) {
      this.items = [], this.containers = [this];
      var i2, s2, n, o, a, r, l, h, c = this.items, u = [[t.isFunction(this.options.items) ? this.options.items.call(this.element[0], e2, { item: this.currentItem }) : t(this.options.items, this.element), this]], d = this._connectWith();
      if (d && this.ready)
        for (i2 = d.length - 1; i2 >= 0; i2--)
          for (n = t(d[i2], this.document[0]), s2 = n.length - 1; s2 >= 0; s2--)
            o = t.data(n[s2], this.widgetFullName), o && o !== this && !o.options.disabled && (u.push([t.isFunction(o.options.items) ? o.options.items.call(o.element[0], e2, { item: this.currentItem }) : t(o.options.items, o.element), o]), this.containers.push(o));
      for (i2 = u.length - 1; i2 >= 0; i2--)
        for (a = u[i2][1], r = u[i2][0], s2 = 0, h = r.length; h > s2; s2++)
          l = t(r[s2]), l.data(this.widgetName + "-item", a), c.push({ item: l, instance: a, width: 0, height: 0, left: 0, top: 0 });
    }, refreshPositions: function(e2) {
      this.floating = this.items.length ? this.options.axis === "x" || this._isFloating(this.items[0].item) : false, this.offsetParent && this.helper && (this.offset.parent = this._getParentOffset());
      var i2, s2, n, o;
      for (i2 = this.items.length - 1; i2 >= 0; i2--)
        s2 = this.items[i2], s2.instance !== this.currentContainer && this.currentContainer && s2.item[0] !== this.currentItem[0] || (n = this.options.toleranceElement ? t(this.options.toleranceElement, s2.item) : s2.item, e2 || (s2.width = n.outerWidth(), s2.height = n.outerHeight()), o = n.offset(), s2.left = o.left, s2.top = o.top);
      if (this.options.custom && this.options.custom.refreshContainers)
        this.options.custom.refreshContainers.call(this);
      else
        for (i2 = this.containers.length - 1; i2 >= 0; i2--)
          o = this.containers[i2].element.offset(), this.containers[i2].containerCache.left = o.left, this.containers[i2].containerCache.top = o.top, this.containers[i2].containerCache.width = this.containers[i2].element.outerWidth(), this.containers[i2].containerCache.height = this.containers[i2].element.outerHeight();
      return this;
    }, _createPlaceholder: function(e2) {
      e2 = e2 || this;
      var i2, s2 = e2.options;
      s2.placeholder && s2.placeholder.constructor !== String || (i2 = s2.placeholder, s2.placeholder = { element: function() {
        var s3 = e2.currentItem[0].nodeName.toLowerCase(), n = t("<" + s3 + ">", e2.document[0]);
        return e2._addClass(n, "ui-sortable-placeholder", i2 || e2.currentItem[0].className)._removeClass(n, "ui-sortable-helper"), s3 === "tbody" ? e2._createTrPlaceholder(e2.currentItem.find("tr").eq(0), t("<tr>", e2.document[0]).appendTo(n)) : s3 === "tr" ? e2._createTrPlaceholder(e2.currentItem, n) : s3 === "img" && n.attr("src", e2.currentItem.attr("src")), i2 || n.css("visibility", "hidden"), n;
      }, update: function(t2, n) {
        (!i2 || s2.forcePlaceholderSize) && (n.height() || n.height(e2.currentItem.innerHeight() - parseInt(e2.currentItem.css("paddingTop") || 0, 10) - parseInt(e2.currentItem.css("paddingBottom") || 0, 10)), n.width() || n.width(e2.currentItem.innerWidth() - parseInt(e2.currentItem.css("paddingLeft") || 0, 10) - parseInt(e2.currentItem.css("paddingRight") || 0, 10)));
      } }), e2.placeholder = t(s2.placeholder.element.call(e2.element, e2.currentItem)), e2.currentItem.after(e2.placeholder), s2.placeholder.update(e2, e2.placeholder);
    }, _createTrPlaceholder: function(e2, i2) {
      var s2 = this;
      e2.children().each(function() {
        t("<td>&#160;</td>", s2.document[0]).attr("colspan", t(this).attr("colspan") || 1).appendTo(i2);
      });
    }, _contactContainers: function(e2) {
      var i2, s2, n, o, a, r, l, h, c, u, d = null, p = null;
      for (i2 = this.containers.length - 1; i2 >= 0; i2--)
        if (!t.contains(this.currentItem[0], this.containers[i2].element[0]))
          if (this._intersectsWith(this.containers[i2].containerCache)) {
            if (d && t.contains(this.containers[i2].element[0], d.element[0]))
              continue;
            d = this.containers[i2], p = i2;
          } else
            this.containers[i2].containerCache.over && (this.containers[i2]._trigger("out", e2, this._uiHash(this)), this.containers[i2].containerCache.over = 0);
      if (d)
        if (this.containers.length === 1)
          this.containers[p].containerCache.over || (this.containers[p]._trigger("over", e2, this._uiHash(this)), this.containers[p].containerCache.over = 1);
        else {
          for (n = 1e4, o = null, c = d.floating || this._isFloating(this.currentItem), a = c ? "left" : "top", r = c ? "width" : "height", u = c ? "pageX" : "pageY", s2 = this.items.length - 1; s2 >= 0; s2--)
            t.contains(this.containers[p].element[0], this.items[s2].item[0]) && this.items[s2].item[0] !== this.currentItem[0] && (l = this.items[s2].item.offset()[a], h = false, e2[u] - l > this.items[s2][r] / 2 && (h = true), n > Math.abs(e2[u] - l) && (n = Math.abs(e2[u] - l), o = this.items[s2], this.direction = h ? "up" : "down"));
          if (!o && !this.options.dropOnEmpty)
            return;
          if (this.currentContainer === this.containers[p])
            return this.currentContainer.containerCache.over || (this.containers[p]._trigger("over", e2, this._uiHash()), this.currentContainer.containerCache.over = 1), void 0;
          o ? this._rearrange(e2, o, null, true) : this._rearrange(e2, null, this.containers[p].element, true), this._trigger("change", e2, this._uiHash()), this.containers[p]._trigger("change", e2, this._uiHash(this)), this.currentContainer = this.containers[p], this.options.placeholder.update(this.currentContainer, this.placeholder), this.containers[p]._trigger("over", e2, this._uiHash(this)), this.containers[p].containerCache.over = 1;
        }
    }, _createHelper: function(e2) {
      var i2 = this.options, s2 = t.isFunction(i2.helper) ? t(i2.helper.apply(this.element[0], [e2, this.currentItem])) : i2.helper === "clone" ? this.currentItem.clone() : this.currentItem;
      return s2.parents("body").length || t(i2.appendTo !== "parent" ? i2.appendTo : this.currentItem[0].parentNode)[0].appendChild(s2[0]), s2[0] === this.currentItem[0] && (this._storedCSS = { width: this.currentItem[0].style.width, height: this.currentItem[0].style.height, position: this.currentItem.css("position"), top: this.currentItem.css("top"), left: this.currentItem.css("left") }), (!s2[0].style.width || i2.forceHelperSize) && s2.width(this.currentItem.width()), (!s2[0].style.height || i2.forceHelperSize) && s2.height(this.currentItem.height()), s2;
    }, _adjustOffsetFromHelper: function(e2) {
      typeof e2 == "string" && (e2 = e2.split(" ")), t.isArray(e2) && (e2 = { left: +e2[0], top: +e2[1] || 0 }), "left" in e2 && (this.offset.click.left = e2.left + this.margins.left), "right" in e2 && (this.offset.click.left = this.helperProportions.width - e2.right + this.margins.left), "top" in e2 && (this.offset.click.top = e2.top + this.margins.top), "bottom" in e2 && (this.offset.click.top = this.helperProportions.height - e2.bottom + this.margins.top);
    }, _getParentOffset: function() {
      this.offsetParent = this.helper.offsetParent();
      var e2 = this.offsetParent.offset();
      return this.cssPosition === "absolute" && this.scrollParent[0] !== this.document[0] && t.contains(this.scrollParent[0], this.offsetParent[0]) && (e2.left += this.scrollParent.scrollLeft(), e2.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === this.document[0].body || this.offsetParent[0].tagName && this.offsetParent[0].tagName.toLowerCase() === "html" && t.ui.ie) && (e2 = { top: 0, left: 0 }), { top: e2.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0), left: e2.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0) };
    }, _getRelativeOffset: function() {
      if (this.cssPosition === "relative") {
        var t2 = this.currentItem.position();
        return { top: t2.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(), left: t2.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft() };
      }
      return { top: 0, left: 0 };
    }, _cacheMargins: function() {
      this.margins = { left: parseInt(this.currentItem.css("marginLeft"), 10) || 0, top: parseInt(this.currentItem.css("marginTop"), 10) || 0 };
    }, _cacheHelperProportions: function() {
      this.helperProportions = { width: this.helper.outerWidth(), height: this.helper.outerHeight() };
    }, _setContainment: function() {
      var e2, i2, s2, n = this.options;
      n.containment === "parent" && (n.containment = this.helper[0].parentNode), (n.containment === "document" || n.containment === "window") && (this.containment = [0 - this.offset.relative.left - this.offset.parent.left, 0 - this.offset.relative.top - this.offset.parent.top, n.containment === "document" ? this.document.width() : this.window.width() - this.helperProportions.width - this.margins.left, (n.containment === "document" ? this.document.height() || document.body.parentNode.scrollHeight : this.window.height() || this.document[0].body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]), /^(document|window|parent)$/.test(n.containment) || (e2 = t(n.containment)[0], i2 = t(n.containment).offset(), s2 = t(e2).css("overflow") !== "hidden", this.containment = [i2.left + (parseInt(t(e2).css("borderLeftWidth"), 10) || 0) + (parseInt(t(e2).css("paddingLeft"), 10) || 0) - this.margins.left, i2.top + (parseInt(t(e2).css("borderTopWidth"), 10) || 0) + (parseInt(t(e2).css("paddingTop"), 10) || 0) - this.margins.top, i2.left + (s2 ? Math.max(e2.scrollWidth, e2.offsetWidth) : e2.offsetWidth) - (parseInt(t(e2).css("borderLeftWidth"), 10) || 0) - (parseInt(t(e2).css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left, i2.top + (s2 ? Math.max(e2.scrollHeight, e2.offsetHeight) : e2.offsetHeight) - (parseInt(t(e2).css("borderTopWidth"), 10) || 0) - (parseInt(t(e2).css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top]);
    }, _convertPositionTo: function(e2, i2) {
      i2 || (i2 = this.position);
      var s2 = e2 === "absolute" ? 1 : -1, n = this.cssPosition !== "absolute" || this.scrollParent[0] !== this.document[0] && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent, o = /(html|body)/i.test(n[0].tagName);
      return { top: i2.top + this.offset.relative.top * s2 + this.offset.parent.top * s2 - (this.cssPosition === "fixed" ? -this.scrollParent.scrollTop() : o ? 0 : n.scrollTop()) * s2, left: i2.left + this.offset.relative.left * s2 + this.offset.parent.left * s2 - (this.cssPosition === "fixed" ? -this.scrollParent.scrollLeft() : o ? 0 : n.scrollLeft()) * s2 };
    }, _generatePosition: function(e2) {
      var i2, s2, n = this.options, o = e2.pageX, a = e2.pageY, r = this.cssPosition !== "absolute" || this.scrollParent[0] !== this.document[0] && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent, l = /(html|body)/i.test(r[0].tagName);
      return this.cssPosition !== "relative" || this.scrollParent[0] !== this.document[0] && this.scrollParent[0] !== this.offsetParent[0] || (this.offset.relative = this._getRelativeOffset()), this.originalPosition && (this.containment && (e2.pageX - this.offset.click.left < this.containment[0] && (o = this.containment[0] + this.offset.click.left), e2.pageY - this.offset.click.top < this.containment[1] && (a = this.containment[1] + this.offset.click.top), e2.pageX - this.offset.click.left > this.containment[2] && (o = this.containment[2] + this.offset.click.left), e2.pageY - this.offset.click.top > this.containment[3] && (a = this.containment[3] + this.offset.click.top)), n.grid && (i2 = this.originalPageY + Math.round((a - this.originalPageY) / n.grid[1]) * n.grid[1], a = this.containment ? i2 - this.offset.click.top >= this.containment[1] && i2 - this.offset.click.top <= this.containment[3] ? i2 : i2 - this.offset.click.top >= this.containment[1] ? i2 - n.grid[1] : i2 + n.grid[1] : i2, s2 = this.originalPageX + Math.round((o - this.originalPageX) / n.grid[0]) * n.grid[0], o = this.containment ? s2 - this.offset.click.left >= this.containment[0] && s2 - this.offset.click.left <= this.containment[2] ? s2 : s2 - this.offset.click.left >= this.containment[0] ? s2 - n.grid[0] : s2 + n.grid[0] : s2)), { top: a - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + (this.cssPosition === "fixed" ? -this.scrollParent.scrollTop() : l ? 0 : r.scrollTop()), left: o - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + (this.cssPosition === "fixed" ? -this.scrollParent.scrollLeft() : l ? 0 : r.scrollLeft()) };
    }, _rearrange: function(t2, e2, i2, s2) {
      i2 ? i2[0].appendChild(this.placeholder[0]) : e2.item[0].parentNode.insertBefore(this.placeholder[0], this.direction === "down" ? e2.item[0] : e2.item[0].nextSibling), this.counter = this.counter ? ++this.counter : 1;
      var n = this.counter;
      this._delay(function() {
        n === this.counter && this.refreshPositions(!s2);
      });
    }, _clear: function(t2, e2) {
      function i2(t3, e3, i3) {
        return function(s3) {
          i3._trigger(t3, s3, e3._uiHash(e3));
        };
      }
      this.reverting = false;
      var s2, n = [];
      if (!this._noFinalSort && this.currentItem.parent().length && this.placeholder.before(this.currentItem), this._noFinalSort = null, this.helper[0] === this.currentItem[0]) {
        for (s2 in this._storedCSS)
          (this._storedCSS[s2] === "auto" || this._storedCSS[s2] === "static") && (this._storedCSS[s2] = "");
        this.currentItem.css(this._storedCSS), this._removeClass(this.currentItem, "ui-sortable-helper");
      } else
        this.currentItem.show();
      for (this.fromOutside && !e2 && n.push(function(t3) {
        this._trigger("receive", t3, this._uiHash(this.fromOutside));
      }), !this.fromOutside && this.domPosition.prev === this.currentItem.prev().not(".ui-sortable-helper")[0] && this.domPosition.parent === this.currentItem.parent()[0] || e2 || n.push(function(t3) {
        this._trigger("update", t3, this._uiHash());
      }), this !== this.currentContainer && (e2 || (n.push(function(t3) {
        this._trigger("remove", t3, this._uiHash());
      }), n.push(function(t3) {
        return function(e3) {
          t3._trigger("receive", e3, this._uiHash(this));
        };
      }.call(this, this.currentContainer)), n.push(function(t3) {
        return function(e3) {
          t3._trigger("update", e3, this._uiHash(this));
        };
      }.call(this, this.currentContainer)))), s2 = this.containers.length - 1; s2 >= 0; s2--)
        e2 || n.push(i2("deactivate", this, this.containers[s2])), this.containers[s2].containerCache.over && (n.push(i2("out", this, this.containers[s2])), this.containers[s2].containerCache.over = 0);
      if (this.storedCursor && (this.document.find("body").css("cursor", this.storedCursor), this.storedStylesheet.remove()), this._storedOpacity && this.helper.css("opacity", this._storedOpacity), this._storedZIndex && this.helper.css("zIndex", this._storedZIndex === "auto" ? "" : this._storedZIndex), this.dragging = false, e2 || this._trigger("beforeStop", t2, this._uiHash()), this.placeholder[0].parentNode.removeChild(this.placeholder[0]), this.cancelHelperRemoval || (this.helper[0] !== this.currentItem[0] && this.helper.remove(), this.helper = null), !e2) {
        for (s2 = 0; n.length > s2; s2++)
          n[s2].call(this, t2);
        this._trigger("stop", t2, this._uiHash());
      }
      return this.fromOutside = false, !this.cancelHelperRemoval;
    }, _trigger: function() {
      t.Widget.prototype._trigger.apply(this, arguments) === false && this.cancel();
    }, _uiHash: function(e2) {
      var i2 = e2 || this;
      return { helper: i2.helper, placeholder: i2.placeholder || t([]), position: i2.position, originalPosition: i2.originalPosition, offset: i2.positionAbs, item: i2.currentItem, sender: e2 ? e2.element : null };
    } });
  });

  // webpack/app.jsx
  var import_sweetalert2 = __toESM(require_sweetalert2_all());
  var import_formBuilder = __toESM(require_form_builder_min());
  window.Swal = import_sweetalert2.default;
  window.formBuilder = import_formBuilder.default;
})();
/*!
 * Determine if an object is a Buffer
 *
 * @author   Feross Aboukhadijeh <https://feross.org>
 * @license  MIT
 */
/*!
 * jQuery JavaScript Library v3.6.0
 * https://jquery.com/
 *
 * Includes Sizzle.js
 * https://sizzlejs.com/
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2021-03-02T17:08Z
 */
/*!
 * jQuery Validation Plugin v1.19.4
 *
 * https://jqueryvalidation.org/
 *
 * Copyright (c) 2022 Jörn Zaefferer
 * Released under the MIT license
 */
/*!
 * jQuery formBuilder: https://formbuilder.online/
 * Version: 3.8.2
 * Author: Kevin Chappell <kevin.b.chappell@gmail.com>
 */
/*!
 * mi18n - https://github.com/Draggable/mi18n
 * Version: 0.4.7
 * Author: Kevin Chappell <kevin.b.chappell@gmail.com> (http://kevin-chappell.com)
 */
/*!
* sweetalert2 v11.4.17
* Released under the MIT License.
*/
/*! jQuery UI - v1.12.0 - 2016-08-17
* http://jqueryui.com
* Includes: widget.js, data.js, scroll-parent.js, widgets/sortable.js, widgets/mouse.js
* Copyright jQuery Foundation and other contributors; Licensed MIT */
