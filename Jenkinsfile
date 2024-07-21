pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Install Packages') {
            steps {
                ansiblePlaybook playbook: 'ansible/vm-setup.yml', inventory: 'ansible/inventory/hosts'
            }
        }
    }
}