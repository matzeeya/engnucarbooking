<div id="calendar"></div>
<!--@foreach($events as $drug=>$d)
  {{ $d['title'] }} 
  {{ $d['start'] }} 
  {{ $d['end'] }} 
@endforeach-->
<script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay',
      },
    });
  });
</script>