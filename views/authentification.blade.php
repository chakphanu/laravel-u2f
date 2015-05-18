<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fr" />
    <script src="{!! route('u2f.assets.js') !!}"></script>
</head>
<body>


<h1>Auth by key</h1>

{!! Form::open(array('route' => 'u2f.auth', 'id' => 'form')) !!}
{!! Form::hidden('authentification', '', ['id' => 'authentification']) !!}
{!! Form::close() !!}


<script type="text/javascript">
    setTimeout(function() {
        var req = {!! json_encode($authentificationData) !!};

        u2f.sign(req, function(data) {
            var form = document.getElementById('form');
            var auth = document.getElementById('authentification');
            console.log("Authenticate callback", data);
            auth.value=JSON.stringify(data);
            form.submit();
        });
    }, 1000);
</script>
</body>
</html>
