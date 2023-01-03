

const tw = new Date();
if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
else (a=tw.getTime());
tw.setTime(a);
let tahun= tw.getFullYear ();
let hari= tw.getDay ();
let bulan= tw.getMonth ();
let tanggal= tw.getDate ();
let hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
let bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
document.getElementById("tb-date").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
