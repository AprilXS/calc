pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Test') {
            steps {
                shell: 'ansible-playbook -i ansible/inventory/hosts ansible/vm-setup.yml'
            }
        }
    }
}