@extends('pages.back-end.home')
@section('listBooking')
<table class="table table-hover">
<thead>
    <tr>
      <th scope="col" colspan="3">รายการจองของฉัน</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $list)
    <tr>
      <td scope="row"><img src="https://www.engdict.com/data/vocab_img/0030/_img/637327205381203546_mini.png" width="100" height="100"></td>
      <td scope="row">
      <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <!--<img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">-->
        <div class="d-flex gap-2 w-100 justify-content-between">
          <div>
            <h6 class="mb-0">List group item heading</h6>
            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
          </div>
          <small class="opacity-50 text-nowrap">
            @if($list->status =='0')
              รอตรวจสอบ
            @elseif($list->status =='1')
              อนุมัติ
            @elseif($list->status =='2')
              ไม่อนุมัติ
            @elseif($list->status =='3')
              ยกเลิกโดยผู้จอง
            @else
              ยกเลิกโดยผู้ดูแลระบบ
            @endif
          </small>
        </div>
      </a>
      </td>
      <td>รายละเอียด</td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">Page 1</td>
    </tr>
  </tfoot>
</table>
@endsection