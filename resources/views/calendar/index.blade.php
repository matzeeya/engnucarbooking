<div id="calendar"></div>
<script>
  $(document).ready(function() {
    //console.log(events);
    $('#calendar').fullCalendar({
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month, agendaWeek, agendaDay',
      },
    });
  });
</script>