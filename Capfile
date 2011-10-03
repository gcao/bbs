set :application, "bbs"
set :deploy_to, "/data/apps/#{application}"
 
set :scm, :git
set :repository, "git://github.com/gcao/#{application}.git"

if ENV['STAGING']
  set :user, "vagrant"
  set :use_sudo, true

  server 'vagrant', :app, :web, :db, :primary => true
else
  set :user, "root"
  set :use_sudo, false
  
  ami_host = `ami_host`.strip
  # ami_host = `new_instance`.strip
  
  # AMI ami-0d729464: ubuntu 9.04 server base 
  server ami_host, :app, :web, :db, :primary => true
end

namespace :deploy do
  task :start do
  end
  
  task :stop do
  end
  
  task :restart, :roles => :app, :except => { :no_release => true } do
    #try_runner "touch #{current_path}/tmp/restart.txt"
  end
end

after "deploy:update_code", :copy_over_config_files

task :copy_over_config_files do
  run "cp -rf #{deploy_to}/#{shared_dir}/config/* #{release_path}/config/"
end
