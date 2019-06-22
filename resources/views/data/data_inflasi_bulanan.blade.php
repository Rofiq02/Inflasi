@extends('template')
@section('judul')
Data Inflasi Bulanan
@stop

@section('ac-inflasi')
active
@stop

@section('content')


    <div class="box">
        <div class="box-header">
            <a href="inflasi_bulanan/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
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
                @foreach($inflasi as $rsInf)
            <tr>
                  <td>{{ $rsInf -> kd_inflasi }}</td>
                  <td>{{ App\MGlobal::Get_Bulan($rsInf->kd_bulan) }}</td>
                  <td>{{ $rsInf -> tahun }}</td>
                  <td>{{ $rsInf -> besar_inflasi }} %</td>
                  <td>
                        <a href="/inflasi_bulanan/edit/{{ $rsInf->kd_inflasi }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/inflasi_bulanan/hapus/{{ $rsInf->kd_inflasi }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




