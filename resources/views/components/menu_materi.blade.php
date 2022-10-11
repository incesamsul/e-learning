<h4>Materi</h4><hr>
<a href="{{ URL::to('/materi_video/' . $pelajaran->id_pelajaran) }}">Materi Video</a><hr>
<a href="{{ URL::to('/materi_tertulis/' . $pelajaran->id_pelajaran) }}">Materi Tertulis</a><hr>
<a href="{{ URL::to('/virtual_coding/' . $pelajaran->id_pelajaran ) }}">Virtual Coding</a><hr>
<a href="{{ URL::to('/quiz/'.$pelajaran->id_pelajaran) }}">Quiz</a><hr>
<a href="{{ URL::to('/pelajaran_saya') }}">Kembali</a><hr>
