<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Welcome to StackExchange Api consumer</h2>
                <h5>Use instrunctions</h5>
                <p>
                    <em>
                        Parameters must be sended via url:<br />
                        http://localhost/preguntas/{tagged}/{fromdate}/{dateTo}
                    </em>
                    <ul>
                        <li>tagged: Required. Tag to filter on.</li>
                        <li>fromdate: Optional. fromdate to filter on.</li>
                        <li>todate: Optional. todate to filter on.</li>
                    </ul>
                </p>
                <p>Examples:</p>
                <ul>
                    <li>Full call: <a target="_blank" href="http://localhost/preguntas/javascript/2023-01-02/2023-03-31">http://localhost/preguntas/javascript/2023-01-02/2023-03-31</a></li>
                    <li>Minimum call: <a target="_blank" href="http://localhost/preguntas/javascript">http://localhost/preguntas/javascript</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>