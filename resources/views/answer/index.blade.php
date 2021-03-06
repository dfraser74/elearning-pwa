@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <h6>Classroom {{ $classroom->nama }}</h6>
        <h3>Quiz {{ $quiz->nama }}</h3>
    </div>
    <div class="row">
        <table class="table highlight">
			<thead>
				<tr>
					<th>NRP / NIDN</th>
					<th>Nama Peserta</th>
					<th>Status Pengerjaan</th>
				</tr>
			</thead>
			<tbody>
				@if(count($participants) > 0)
				@foreach($participants as $participant)
				<tr>
					<td>{{ $participant->nomorinduk }}</td>
					<td>{{ $participant->username }}</td>
					<td>
						@if($ismhs == true) <!-- Jangan lupa diubah ke true -->
						@if(!empty($participant->answerid))
						<a class="btn btn-primary btn-xs" data-toggle="tooltip" title="Lihat Jawaban" href="{{ url('quiz').$quiz->id.'/answer/'.$participant->answerid}}">
							<i class="fa fa-list"></i>
						</a>
						<a class="btn btn-warning btn-xs" data-toggle="tooltip" title="Edit Jawaban" href="{{ url('quiz').$quiz->id.'/answer/'.$participant->answerid.'/edit'}}">
							<i class="fa fa-edit"></i>
						</a>
						@else
						<a class="btn btn-success btn-xs" data-toggle="tooltip" title="Tambah Jawaban" href="{{ url('quiz').$quiz->id.'/answer/create'}}">
							<i class="fa fa-plus"></i>
						</a>
						@endif
						@else
						@if(!empty($participant->answerid))
						<a class="btn btn-primary btn-xs" data-toggle="tooltip" title="Lihat Jawaban" href="{{ url('quiz').$quiz->id.'/answer/'.$participant->answerid}}">
							<i class="fa fa-list"></i>
						</a>
						@else
						Peserta belum mengerjakan penugasan
						@endif
						@endif
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
    </div>
</div>
@endsection
