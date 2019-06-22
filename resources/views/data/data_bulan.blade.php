@extends('template')

@section('judul')
Data Detail Item
@stop

@section('ac-detail_item')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="bulan/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
                @csrf
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Bulan</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bulan as $rsBln)
            <tr>
                  <td>{{ $rsBln -> kd_bulan }}</td>
                  <td>{{ $rsBln -> nama_bulan }}</td>
                  <td>
                        <a href="/bulan/edit/{{ $rsBln->kd_bulan }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/bulan/hapus/{{ $rsBln->kd_bulan }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




