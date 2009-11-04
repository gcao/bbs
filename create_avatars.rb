Dir["**/*_big.jpg"].each do |f|
  m_file = f.sub("_big.jpg", "_middle.jpg")
  s_file = f.sub("_big.jpg", "_small.jpg")
  puts "cp -u #{f} #{m_file}"
  puts "#{m_file} is skipped" if File.exists?(m_file)
  # `cp -u #{f} #{m_file}` unless File.exists?(m_file)
  # `cp -u #{f} #{s_file}` unless File.exists?(s_file)
end