<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\DataPenduduk;
use Carbon\Carbon;

class DataImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $iterate = 0;
        foreach ($collection as $item) {
            $iterate++;
            if ($iterate > 3) {
                try {
                    $parsedDate = Carbon::createFromFormat('d/m/Y', $item[5]);
                } catch (\Exception $e) {
                    $referenceDate = Carbon::create(1899, 12, 30);

                    $targetDate = $referenceDate->addDays($item[5]);

                    $formattedDate = $targetDate->format('d/m/Y');
                    $item[5] = $formattedDate;
                }
                $data = [
                    'nama' => strtoupper($item[1]),
                    'jenis_kelamin' => strtoupper($item[2]),
                    'status_perkawinan' => strtoupper($item[3]),
                    'tempat_lahir' => strtoupper($item[4]),
                    'tanggal_lahir' => $item[5],
                    'agama' => strtoupper($item[6]),
                    'pendidikan_terakhir' => $item[7],
                    'pekerjaan' => $item[8],
                    'kewarganegaraan' => strtoupper($item[9]),
                    'alamat_sekarang' => strtoupper($item[10]),
                    'alamat_ktp' => strtoupper($item[14]),
                    'status_hubungan_keluarga' => strtoupper($item[11]),
                    'nik' => str_replace('_', '', $item[12]),
                    'no_kk' => str_replace('_', '', $item[13]),
                ];
                DataPenduduk::create($data);
            }
        }
    }
}
