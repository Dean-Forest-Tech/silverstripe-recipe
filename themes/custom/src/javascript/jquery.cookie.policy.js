/*
 * UK COOKIE POLICY NOTICE
 * Written by Lee Jones (mail@leejones.me.uk)
 * Project Home Page: https://github.com/prolificjones82/uk_cookie_policy_notice
 * Released under GNU Lesser General Public License (http://www.gnu.org/copyleft/lgpl.html)
 *
 * Please submit all problems or questions to the Issues page on
 * the projects GitHub page:
 * https://github.com/prolificjones82/uk_cookie_policy_notice
 *
 *
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function ($) {
  let config = {}
  const pluses = /\+/g

  function decode(s) {
    if (config.raw) {
      return s
    }

    return decodeURIComponent(s.replace(pluses, ' '))
  }

  function decodeAndParse(s) {
    let jsonVal = {}

    if (s.indexOf('"') === 0) {
      // This is a quoted cookie as according to RFC2068, unescape...
      s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\')
    }

    s = decode(s)

    try {
      jsonVal = config.json ? JSON.parse(s) : s
    } catch (e) {
      alert(e.message)
    }

    return jsonVal
  }

  config = function (key, value, options) {
    // Write
    if (value !== undefined) {
      options = $.extend({}, config.defaults, options)

      if (typeof options.expires === 'number') {
        const days = options.expires
        options.expires = new Date()
        const t = options.expires
        t.setDate(t.getDate() + days)
      }

      value = config.json ? JSON.stringify(value) : String(value)

      document.cookie = [
        config.raw ? key : encodeURIComponent(key), '=',
        config.raw ? value : encodeURIComponent(value),
        // use expires attribute, max-age is not supported by IE
        options.expires ? '; expires=' + options.expires.toUTCString() : '',
        options.path ? '; path=' + options.path : '',
        options.domain ? '; domain=' + options.domain : '',
        options.secure ? '; secure' : '',
      ].join('')

      return document.cookie
    }

    // Read
    const cookies = document.cookie.split('; ')
    let result = key ? undefined : {}

    for (let i = 0, l = cookies.length; i < l; i += 1) {
      const parts = cookies[i].split('=')
      const name = decode(parts.shift())
      const cookie = parts.join('=')
      if (key && key === name) {
        result = decodeAndParse(cookie)
        break
      }
      if (!key) {
        result[name] = decodeAndParse(cookie)
      }
    }

    return result
  }

  $.cookie = config
  config.defaults = {}

  $.removeCookie = function (key, options) {
    if ($.cookie(key) !== undefined) {
      // Must not alter options, thus extending a fresh object...
      $.cookie(key, '', $.extend({}, options, {
        expires: -1,
      }))
      return true
    }

    return false
  }
}(jQuery));
/* END OF COOKIE PLUGIN */

/* START OF COOKIE POLICY */
(function ($) {
  let cookieMessage = 'This site uses cookies, by continuing to use this '
  cookieMessage += 'site you agree to our use of cookies'

  $.fn.cookieNotify = function (options) {
    // plugin options
    options = $.extend({
      text: cookieMessage,
      // agree button text
      btnText: 'I Agree',
      // main info bar background colour, accepts HEX or RGBA
      bgColor: '#CCC',
      // main info bar text colour, accepts HEX or RGBA
      textColor: '#000',
      // button background colour, accepts HEX or RGBA
      btnColor: '#000',
      // button text colour, accepts HEX or RGBA
      btnTextColor: '#FFF',
      // info bar position
      position: 'top',
      // info bar left spacing, accepts px or % values
      leftPadding: '0',
      // info bar right spacing, accepts px or % values
      rightPadding: '0',
      // on click hide animation, options are fadeOut, slideUp
      hideAnimation: 'fadeOut',
    }, options)

    // create stylesheet
    let defaultCSS = '#cookie_container { display: none; position: fixed; '
    defaultCSS += options.position
    defaultCSS += ': 0; left: '
    defaultCSS += options.leftPadding
    defaultCSS += '; right: '
    defaultCSS += options.rightPadding
    defaultCSS += '; z-index: 999; padding: 10px; background-color:'
    defaultCSS += options.bgColor
    defaultCSS += '; color:'
    defaultCSS += options.textColor
    defaultCSS += '; } .cookie_inner { width: 90%; margin: 0 auto; }'
    defaultCSS += '.cookie_inner p { margin: 0; padding-top: 4px; }'
    defaultCSS += '#setCookie { float: right; padding: 5px 10px; '
    defaultCSS += 'text-decoration: none; '
    defaultCSS += 'background-color: ' + options.btnColor + '; '
    defaultCSS += 'color: ' + options.btnTextColor + '; }'
    defaultCSS += '#setCookie:hover { background-color: #AAAAAA !important; '
    defaultCSS += 'color: #000000 !important; }'

    $('head').append('<style>' + defaultCSS + '</style>')

    // create popup elements
    let popupElement = '<div id="cookie_container"><div class="cookie_inner">'
    popupElement += '<a id="setCookie" href="#">'
    popupElement += options.btnText
    popupElement += '</a><p>'
    popupElement += options.text
    popupElement += '</p></div></div>'

    $(popupElement).appendTo(this)

    // set cookie function
    $(document.body).on('click', '#setCookie', (e) => {
      e.preventDefault()
      $.cookie('cookie_policy', 'true', {
        expires: 365,
        path: '/',
      })
      if (options.hideAnimation === 'fadeOut') {
        $('#cookie_container').fadeOut()
      } else if (options.hideAnimation === 'slideUp') {
        $('#cookie_container').slideUp()
      }
    })
    // detect cookie
    $(this).ready(() => {
      const cookie = $.cookie('cookie_policy')
      if (!cookie) {
        $('#cookie_container').show()
      }
    })
  }
  $.getJSON($('base')[0].href + 'fetchcookiepolicy', (data) => {
    $('body').cookieNotify({
      btnText: data.CookiePolicyButtonTitle,
      text: data.CookiePolicyDescription,
      position: data.CookiePolicyPosition,
    })
  })
}(jQuery))
