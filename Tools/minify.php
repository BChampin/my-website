<?php

function path($arr) {
  $str = '..'.DIRECTORY_SEPARATOR;
  foreach ($arr as $a) { $str .= $a.DIRECTORY_SEPARATOR; }
  return $str;
}

function orderArray($arr)
{
  $nb = 0;
  for ($i=0; $i < count($arr); $i++) {
    if (preg_match('#.min#', $arr[$i])) {
      $save = $arr[$i];
      unset($arr[$i]);
      array_unshift($arr, $save);
      $nb++;
      $i = $nb;
    }
  }
  return $arr;
}

function minify($folder_path, $type)
{
  switch ($type) {
    case 'css': $reg_comment = '#\/\*.*\*\/#'; break;
    case 'js': $reg_comment = '#//#'; break;
  }

  $mini_content = '';
  $files = orderArray(scandir($folder_path));
  foreach ($files as $file) {
    if (preg_match("#.$type$#", $file) && is_file($folder_path.$file) && $file != "$type.min.$type") {
      foreach(preg_split("/((\r?\n)|(\r\n?))/", file_get_contents($folder_path.$file)) as $line){
        $mini_content .= preg_replace(
          [$reg_comment, "#\s+#", "# {#"],
          ["", " ", "{"],
          $line);
      }
    }
  }
  $mini = fopen("$folder_path$type.min.$type", 'w');
  fputs($mini, $mini_content);
}

// $root = scandir('../');
// foreach ($root as $item) {
//   if (is_dir(path([$item]))) {
//     $sub_root = scandir(path([$item]));
//     if (in_array('core', $sub_root) && is_dir(path([$item, 'core']))) {
//       $core_folder = scandir(path([$item, 'core']));
//       if (in_array('css', $core_folder) && is_dir(path([$item, 'core', 'css']))) {
//         minify(path([$item, 'core', 'css']), 'css');
//       }
//       if (in_array('js', $core_folder) && is_dir(path([$item, 'core', 'js']))) {
//         minify(path([$item, 'core', 'js']), 'js');
//       }
//     }
//   }
// }




print_r($arr);

echo 'Minify OK !';
