<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


</head>
<body>
    <div class="container py-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    {{--  --}}
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div id="mycalendar">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var eventsHappen = @json($myevents);
            console.log(eventsHappen);
            $('#mycalendar').fullCalendar({
                
                header:{
                    left:'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendayDay',
                },
                events: eventsHappen,
            })
        });
    </script>
</body>
</html>