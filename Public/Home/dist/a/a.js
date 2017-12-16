// @ts-nocheck

var l = console.log.bind(console);
var w = console.warn.bind(console);
var e = console.error.bind(console);


//将字符串按照格式转化成数组或者json
function strToArr(str, code, f) {

	var array = str.split(code);
	var arr = [];

	for (var i = 0; i < array.length; i++) {
		var element = array[i];
		if (f != null) {

			if (typeof (f) == 'string') {
				arr[i] = {};
				arr[i][f] = element;

			} else {
				arr[i] = f(i, arr, element);
			}
		} else {
			arr[i] = element;
		}
	}
	return arr;

}


var tool = {

	alert: function (conf) {

		var zz = '<div class="alert-zz "></div>';
		var $zz = $(zz);
		$zz.appendTo('body');

		var alert = '<div class="alert ">\
		<div class="alert-body">\
			<div class="alert-title">'
			+ ((conf.title) ? conf.title : '') +
			'</div>\
			<div class="alert-info">'
			+ ((conf.info) ? conf.info : '') +
			'</div>\
		</div>\
		<div class="alert-footer">\
			<div class="alert-btn-group">\
				<div class="alert-btn yes">\
					确定\
				</div>\
				<div class="alert-btn no">\
					取消\
				</div>\
			</div>\
		</div>\
	</div>';

		var $alert = $(alert);

		$alert.appendTo('body');

		$alert.find('.yes').on('touchstart', function () {
			if (conf.yes != null) {
				conf.yes();
			}
			tool.hide($alert, $zz);
		});

		$alert.find('.no').on('touchstart', function () {
			if (conf.no != null) {
				conf.no();
			}
			tool.hide($alert, $zz);
		});


		setTimeout(function () {
			$alert.addClass('active');
			$zz.addClass('active');
		}, 0);



		w(conf);
	},
	hide: function ($alert, $zz) {

		$alert.removeClass('active');
		$zz.removeClass('active');
		setTimeout(function () {
			$alert.remove();
			$zz.remove();
		}, 400);

	}
};



function showPanel(index) {


	$('.zz-box[data-index=' + index + ']').css('opacity', '1');
	$('.zz-box[data-index=' + index + ']').css('z-index', '999');
	$('.zf-box[data-index=' + index + ']').css('bottom', '0');

}

function heidPanel(index) {
	if (!index) {

		$('.zz-box').css('opacity', '0');
		$('.zf-box').css('bottom', '-100%');

		setTimeout(function () {
			$('.zz-box').css('z-index', '-1');
		}, 500);

		return;
	}

	$('.zz-box[data-index=' + index + ']').css('opacity', '0');
	$('.zf-box[data-index=' + index + ']').css('bottom', '-100%');

	setTimeout(function () {

		$('.zz-box[data-index=' + index + ']').css('z-index', '-1');

	}, 500);

}

init();
function init() {

	var eventName = 'touchstart';
	var el = '.zz-box,.close';
	var fun = function (event) {
		heidPanel();
	}
	$(el).on(eventName, fun);

}


var msg = {
	s: function (conf) {

		var $msg = $('<div/>')
		$msg.appendTo('body');
		$msg.addClass('msg');
		$msg.text(conf.title);
		// $msg.css('bottom', conf.bottom);
		setTimeout(function () {
			$msg.addClass('active');
		}, 0);

		setTimeout(function () {
			$msg.removeClass('active');
		}, 1000);

		setTimeout(function () {
			$msg.remove();
		}, 3000);
	}

}




