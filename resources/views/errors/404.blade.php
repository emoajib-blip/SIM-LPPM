@extends('errors.layout')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('code', '404')

@section('message', $exception->getMessage() ?: 'Oops… Halaman tidak ditemukan')

@section('description', $exception->getMessage() ?: 'Maaf, halaman yang Anda cari tidak ditemukan atau telah dipindahkan.')
