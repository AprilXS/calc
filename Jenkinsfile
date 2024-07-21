pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage("Execute Ansible") {
            steps {
                ansiblePlaybook credentialsId: 'ubuntu',
                                 disableHostKeyChecking: true,
                                 installation: 'ansible',
                                 inventory: 'ansible/inventory/hosts',
                                 playbook: 'ansible/vm-setup.yml',
            }    
        }    
    }
}