<div id="calendar"></div>
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