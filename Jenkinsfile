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
                sh 'ssh -i /var/lib/jenkins/.ssh/m ubuntu@10.201.22.25'
                // sh 'ansible -i ansible/inventory/hosts all -m ping'
            }
        }
        // stage("Execute Ansible") {
        //     steps {
        //         ansiblePlaybook credentialsId: '8bc2cf17-308b-4992-bd53-bf8f43d0c3ad',
        //                          disableHostKeyChecking: true,
        //                          installation: 'ansible',
        //                          inventory: 'ansible/inventory/hosts',
        //                          playbook: 'ansible/vm-setup.yml'
        //     }    
        // }    
    }
}