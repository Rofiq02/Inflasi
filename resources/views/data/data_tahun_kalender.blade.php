@extends('template')

@section('judul')
Data Tahun Kalender
@stop

@section('ac-inflasi')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="tahun_kalender/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
                @csrf
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Besar Inflasi</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tahun_kalender as $rsInf)
            <tr>
                  <td>{{ $rsInf -> kd_kalender }}</td>
                  <td>{{ App\MGlobal::Get_Bulan($rsInf->kd_bulan) }} </td>
                  <td>{{ $rsInf -> tahun }}</td>
                  <td>{{ $rsInf -> besar_inflasi }}%</td>
                  <td>
                        <a href="/tahun_kalender/edit/{{ $rsInf->kd_kalender }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/tahun_kalender/hapus/{{ $rsInf->kd_kalender }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




