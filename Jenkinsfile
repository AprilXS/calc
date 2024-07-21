pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..',
                // test the connection to the remote server
                sh 'ansible -i ansible/inventory/hosts all -m ping'
            }
        }
        stage("Execute Ansible") {
            steps {
                ansiblePlaybook credentialsId: '8bc2cf17-308b-4992-bd53-bf8f43d0c3ad',
                                 disableHostKeyChecking: true,
                                 installation: 'ansible',
                                 inventory: 'ansible/inventory/hosts',
                                 playbook: 'ansible/vm-setup.yml'
            }    
        }    
    }
}