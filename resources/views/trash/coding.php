if($request->status != ''){
                $details = [
                    'greeting'  => 'Kepada Departemen ' . $request->divisi . ' unit bisnis ' . $request->bisnis,
                    'head'      => 'Kami menyampaikan bahwa, berdasarkan hasil pemeriksaan kami, terhadap lemburan dengan SPL,',
                    'line1'     => 'Nomor SPL : ' . $request->nomor ,
                    'line2'     => 'Tanggal   : ' . $request->hari . ', ' . $request->hspl . ' ' . $request->bspl . ' ' . $request->thspl,
                    'line3'     => 'Status    : ' . $request->status,
                    'thanks'    => 'Terimakasih atas perhatian anda.',
                    'footnote'  =>
                    'Note :
                    Jika SPL ditolak, maka harus membuat SPL baru.',
                    'actionText' => 'Buka Situs',
                    'actionURL' => url('http://localhost:8000/'),
                    'order_id' => 103
                ];
                
                Notification::route('mail', $emailadmin)->notify(new ApproveNotification($details));
                Notification::route('mail', $emailmanajer)->notify(new ApproveNotification($details));
            }elseif([[$request->pemohon != ''],[$request->nmmanajer == ''],[$request->nmhr == '']]){
                $details = [
                    'greeting'  => 'Kepada kepala Departemen ' . $request->divisi . ' unit bisnis ' . $request->bisnis,
                    'head'      => 'Surat perintah lembur telah dibuat, dengan data SPL',
                    'line1'     => 'Nomor SPL : ' . $request->nomor ,
                    'line2'     => 'Tanggal   : ' . $request->hari . ', ' . $request->hspl . ' ' . $request->bspl . ' ' . $request->thspl,
                    'line3'     => 'Status    : Menunggu persetujuan MANAJER',
                    'thanks'    => 'Terimakasih atas perhatian anda.',
                    'footnote'  =>
                    'Note :
                    Jika SPL telah disetujui, maka akan langsung diteruskan ke Departemen  HR, cek data sebelum menyetujui. SPL harus segera diproses sebelum pukul 14.00 WIB.',
                    'actionText' => 'Buka Situs',
                    'actionURL' => url('http://localhost:8000/'),
                    'order_id' => 103
                ];
                
                Notification::route('mail', $emailmanajer)->notify(new ApproveNotification($details));
            }elseif([[$request->pemohon != ''],[$request->nmmanajer != ''],[$request->nmhr == '']]){
                $details = [
                    'greeting'  => 'Kepada Departemen HR',
                    'head'      => 'Surat perintah lembur telah dibuat, dengan data SPL',
                    'line1'     => 'Nomor SPL : ' . $request->nomor ,
                    'line2'     => 'Tanggal   : ' . $request->hari . ', ' . $request->hspl . ' ' . $request->bspl . ' ' . $request->thspl,
                    'line3'     => 'Status    : Menunggu persetujuan HR',
                    'thanks'    => 'Terimakasih atas perhatian anda.',
                    'footnote'  =>
                    'Note :
                    SPL telah disetujui manajer.',
                    'actionText' => 'Buka Situs',
                    'actionURL' => url('http://localhost:8000/'),
                    'order_id' => 103
                ];
                
                Notification::route('mail', $emailmanajer)->notify(new ApproveNotification($details));
            }elseif([[$request->pemohon != ''],[$request->nmmanajer != ''],[$request->nmhr != '']]){
                $details = [
                    'greeting'  => 'Kepada Departemen ' . $request->divisi . ' unit bisnis ' . $request->bisnis,
                    'head'      => 'Surat perintah lembur telah disetujui oleh HR',
                    'line1'     => 'Nomor SPL : ' . $request->nomor ,
                    'line2'     => 'Tanggal   : ' . $request->hari . ', ' . $request->hspl . ' ' . $request->bspl . ' ' . $request->thspl,
                    'line3'     => 'Status    : SPL telah disetujui HR untuk dilakukan',
                    'thanks'    => 'Terimakasih atas perhatian anda.',
                    'footnote'  =>
                    'Note :
                    Setelah proses dilakukan, HR akan melakukan pengecekan hasil lemburan.',
                    'actionText' => 'Buka Situs',
                    'actionURL' => url('http://localhost:8000/'),
                    'order_id' => 103
                ];
                
                Notification::route('mail', $emailhr)->notify(new ApproveNotification($details));
            }