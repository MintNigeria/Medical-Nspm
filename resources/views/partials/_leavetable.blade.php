<h5>Sick Leave</h5>


@unless (count($leaves) === 0)

<table class="table p-2">
    <thead class="header">
      <tr>
        <th scope="col">Staff ID</th>
        <th scope="col">No of Days</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($leaves as  $leave)
            <tr>
                <td>{{ $leave->patient->staff_id }}</td>
                <td>{{ $leave->no_of_days }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>




@else
<div class="" style="display: flex;align-items:center;justify-content:center;margin-top:30%;">
   <h4 class="text-danger font-weight-bold">NO LEAVES RECORDED
    </h4>
</div>
@endunless
