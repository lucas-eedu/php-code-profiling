<?php
   $file = fopen('files/new-profiler.log','r'); // Open the file
   if ($file == false) die('Could not open file.');

   $i = 0;
   $arrFile = [];
   
   while(true) {
      $line = fgets($file); // Cycling through each line of the file
      if ($line == null) break;
      $line = substr($line, 55); // Get only the text from the 55th line
      $line = str_replace(array('{', '}', '[', ']', '"'), '', $line); // Removes the characters: {,},[,] and " -> No substitution
      $line = str_replace(array(' ', '::', ':'), ',', $line); // Removes the characters: space,::, : and replace with ","
      $arrFile[$i] = $line; // Assigning the text of the respective line to the array at its position
      $i++;
   }

   $resultFile = fopen('result-files/new-profiler.csv','w'); // Create the file
   fwrite($resultFile, implode($arrFile)); // Write to file (But first I transform the array into a string)

   fclose($file); // Close the file