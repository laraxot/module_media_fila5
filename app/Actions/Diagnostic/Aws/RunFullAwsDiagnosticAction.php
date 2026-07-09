<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\Aws;

use Spatie\QueueableAction\QueueableAction;

class RunFullAwsDiagnosticAction
{
    use QueueableAction;

    public function __construct(
        private readonly TestS3ConnectionAction $testS3Connection,
        private readonly TestS3PermissionsAction $testS3Permissions,
        private readonly TestS3FileOperationsAction $testS3FileOperations,
        private readonly TestCloudFrontConfigAction $testCloudFrontConfig,
        private readonly TestCloudFrontSignedUrlsAction $testCloudFrontSignedUrls,
        private readonly TestIamCredentialsAction $testIamCredentials,
        private readonly TestIamPoliciesAction $testIamPolicies,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function execute(): array
    {
        return [
            's3' => $this->testS3Connection->execute(),
            's3_permissions' => $this->testS3Permissions->execute(),
            's3_operations' => $this->testS3FileOperations->execute(),
            'cloudfront' => $this->testCloudFrontConfig->execute(),
            'cloudfront_signed' => $this->testCloudFrontSignedUrls->execute(),
            'iam_credentials' => $this->testIamCredentials->execute(),
            'iam_policies' => $this->testIamPolicies->execute(),
        ];
    }
}
