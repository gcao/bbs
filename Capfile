load 'deploy' if respond_to?(:namespace) # cap2 differentiator

set :application, "bbs"
set :deploy_to, "/data/apps/#{application}"

set :scm, :git
set :repository, "git://github.com/gcao/#{application}.git"

if ENV['DEPLOYMENT_TARGET'] == 'production'
  set :user, "root"
  set :use_sudo, false

  ami_host = `ami_host`.strip
  # ami_host = `new_instance`.strip

  # AMI ami-0d729464: ubuntu 9.04 server base 
  server ami_host, :app, :web, :db, :primary => true
else
  set :user, "vagrant"
  set :use_sudo, true

  server 'vagrant', :app, :web, :db, :primary => true
end

after "deploy:update_code" do
  copy_over_config_files
  run "chmod a+w #{release_path}/forumdata #{release_path}/forumdata/cache"
end

task :copy_over_config_files do
  run "cp -rf #{deploy_to}/#{shared_dir}/config/* #{release_path}/"
end

