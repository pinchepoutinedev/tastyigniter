{!! get_metas() !!}
<link href="{{ theme_url('demo/assets/images/favicon.svg') }}" rel="shortcut icon" type="image/ico">
<title>{{ sprintf(lang('main::lang.site_title'), lang(get_title()), setting('site_name')) }}</title>
<link href="{{ asset('app/admin/assets/css/admin.css') }}" rel="stylesheet" type="text/css" id="flame-css">
{!! get_style_tags() !!}
<link href="{{ theme_url('demo/assets/css/demo.css') }}" rel="stylesheet" type="text/css" id="demo-css">
